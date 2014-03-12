var iFlyer = new Class({
  Implements: [Events, Options],
  options: {
    tabs: [],
    photoHeight:531,
    photoWidth:800,
    interval:4000,
    indicatorId:'iflyer-indicator',
    galleryTabId: 'gallery-tab',
    imgClass: 'gallery-img',
    editing:false,
    iflyerId:'',
    addText:'',
    thumbHeight:55
  },
  initialize: function(options) {
    this.setOptions(options);
    this.initializeTabs();    
    this.loaded = false;
    this.photos = this.options.photos;
    this.active = 0;
    this.indicator = $(this.options.indicatorId);
    this.element = $('iflyer');
    this.menuElement = $('menu');
    this.photoCanvas = $('photos');
    $('indicator-message').tween('opacity',0,1);
    this.scroller = new iFlyerScroller({imageCount:this.photos.length, imageHeight: this.options.thumbHeight});
    this.injectThumbnails();
    this.galleryDescription = $('gallery-description');
    
    if (this.options.editing) {
      this.galleryDescription.setStyle('opacity',1);
      this.menuElement.setStyle('opacity',1);
    }
    
    this.galleryActive = false;
    this.menuActive = false;
    this.playing = false;
    this.currentTab = $('gallery-tab');
    
    sharebox = new ShareBox({iflyer:this});
    
    if (this.options.editing) {
      //new SortableFeature({id:'details-features2',iflyerId:this.options.iflyerId,addText:this.options.addText});
      this.injectDisabledPhotoIndicator();
    } else {
      this.attachMenuEvents();
    }
    
    // controls the autoplaying of photos
    this.slideTimerFunction = function() { 
      if (this.playing == true) {
        this.showPhoto({increment:1}); 
      }
    }.bind(this)    
    
    var mousemoved;
    var moved = function(){
      mousemoved = $time();
      if (this.galleryActive == false && this.loaded == true) {
        
        if (!this.options.editing) {
          this.fireMenuShowEffects();
        }
        
        this.galleryActive = true;
      } 
      
    }.bind(this);
    
    var tracking = $('gallery-tab-panel').addEvent('mousemove',moved);
    
    var timer = function(){
      
      if ((mousemoved + 700 < $time()) && this.galleryActive == true && this.menuActive == false) {
        
        if (!this.options.editing) {
          this.fireMenuHideEffects();
        }
        
        this.galleryActive = false;
      }
    }.bind(this).periodical(1000);
    
    var showGalleryTip = function(){
      photo = this.photos[this.active];
    }.bind(this);
      
  },
  activateMenu:function(){
    this.menuActive=true;
  },
  deactivateMenu:function(){
    this.menuActive=false;
  },  
  attachMenuEvents:function(){
    this.menuElement.addEvent('mouseenter',this.activateMenu.bind(this));
    this.menuElement.addEvent('mouseleave',this.deactivateMenu.bind(this));
    this.galleryDescription.addEvent('mouseenter',this.activateMenu.bind(this));
    this.galleryDescription.addEvent('mouseleave',this.deactivateMenu.bind(this));
    
    this.attachMenuEffects();
  },
  attachMenuEffects:function(){
    this.menuElement.store('up', new Fx.Tween(this.menuElement, {property: 'opacity', duration:200, transition: Fx.Transitions.linear}));
    this.galleryDescription.store('up', new Fx.Tween(this.galleryDescription, {property: 'opacity', duration:200, transition: Fx.Transitions.linear}));
  },
  fireMenuShowEffects:function(){
    this.galleryDescription.retrieve('up').start(0,1);
    if (this.currentTab.id == 'gallery-tab') {
      this.menuElement.retrieve('up').start(0,1);
    }
  },
  fireMenuHideEffects:function(){
      this.galleryDescription.retrieve('up').start(1,0);
      if (this.currentTab.id == 'gallery-tab') {
        this.menuElement.retrieve('up').start(1,0);
      }
  },
  injectDisabledPhotoIndicator:function(){
    if (this.options.editing) {
      this.disabledPhotoIndicator = new Element('div',{
        styles: {
          'background':'url(/images/iflyer/disabled_image.png) no-repeat center center #000',
          'position':'absolute',
          'left':0,
           'z-index':100001,
           'opacity':0,
           'display':'none'
        }
      }).injectInside(this.photoCanvas);
    }
  },
  injectPhotoCanvas:function(photo,i){
    photo.index = i; 
    photo.injected = false;
    photo.iflyer = this;
    
    photo.canvas = new Element('div', {
      'class': 'slide',
      id: 'slide-'+photo.id,
      styles: { 
      opacity: 0,
      position: 'absolute',
      top: 0,
      left: 0,
      background: '#333',
      height: photo.height,
      width: this.options.photoWidth,
      overlfow:'hidden'
    }
    
    }).injectInside(this.photoCanvas);
    
    photo.canvas.store('effectInstance', new Fx.Tween(photo.canvas, {property: 'opacity', duration: 500, transition: Fx.Transitions.linear}));

    photo.descriptionCanvas = new Element('div', {
      'class': 'photo-description',
      id: 'description-'+photo.id,
      styles: {
        'opacity': '0',
        'position': 'absolute',
        'left':0
      }
    }).injectInside(photo.canvas);
          
          
    var photoContent = new Element('div', {
      id: 'photo'+photo.id+'-description-content',
      'class': 'photo-description-content'
    }).injectInside(photo.descriptionCanvas)
    
    if (this.options.mls != true) {
      photoContent.set('html',photo.description);
    }
          
    if (this.options.editing == true) {
      new InlineEditable({default_text:photo.defaultText,limit:174, id:'photo'+photo.id+'-description-content',obj:'photo',field:'description',update_url:'/photos/'+photo.id});
    }
    
  },
  preloadPhotos:function() {    
    var progress = $('progress-bar');
    
    var photoUrls = new Array();
    for(var i=0, length = this.photos.length; i < length; ++i) {
      photo = this.photos[i];
      if (i < 2) { photoUrls[photoUrls.length] = photo.url }
      this.injectPhotoCanvas(photo,i);
    }
        
	  var preloader =  new Preloader();
  	this.loaderHidden = false;
  	
  	preloader.addEvent('onProgress',function(count, total){
  	  progress.tween('width', progress.getWidth(), ((count/total)*200)+200);

  	  var minCount = (parseInt(total) < 3) ? 0 : 2;
      if (parseInt(count) < minCount || this.loaderHidden == true) {return;}

      this.loaderHidden = true;

  	  exampleFx = new Fx.Tween(this.indicator, {
      	property: 'opacity',
      	duration: 500, 
      	transition: Fx.Transitions.Quart.easeInOut
      });
      
      exampleFx.start.pass([1,0], exampleFx).delay(1000);      
      this.onIflyerLoad.bind(this).delay(1500);
      
      if (this.photos[0].typeOf == 3) {
        this.stop();
         $('gallery-panel-indicator').setStyle('opacity',0);
         if (!$defined(this.photos[0].loaded)) {
           this.photos[0].canvas.retrieve('img').src = "http://images.vicaso.net/i_flyer/panorama/"+this.photos[0].id+".html?version="+this.options.version;
           this.photos[0].loaded = true;
           this.first360 = true;
         } else {
           this.first360 = false;
         }
      } else if (this.photos[0].typeOf == 2) {
        this.firstpano = true;
        this.photos[0].canvas.retrieve('img').setStyle('margin-left',0);
      }

	      
  	}.bind(this));
  	
  	preloader.addEvent('onLoad', function(image,index,src) {
  	 var photo = this.photos[index];
	   this.activateThumbnail.delay(500*index, photo);
	   this.injectPhoto(photo);
  	}.bind(this));
  	
  	preloader.addEvent('onComplete',function(){
  	  var photoUrls = new Array();
  	  
  	  for(var i=0, length = this.photos.length; i < length; ++i) {
        photo = this.photos[i];
        if (i > 1) { photoUrls[photoUrls.length] = photo.url; }
      }
      
      var preloader2 = new Preloader();
      preloader2.addEvent('onLoad', function(image,index,src) {
        var photo = this.photos[index+2];
        this.activateThumbnail.delay(500*index, photo);
        this.injectPhoto(photo);
       }.bind(this));
      preloader2.load(photoUrls);
      
  	}.bind(this))
  	
    preloader.load(photoUrls);
  	this.showHighlight.delay(100*this.photos.length+1, this);
  	
  },
  onIflyerLoad:function(){
    this.indicator.destroy(); 
    this.loaded = true;
    if (!this.options.editing && this.first360 != true && this.firstpano != true) {
      var startPlaying = function() {
        this.start();
      }.bind(this).delay(this.options.interval)
    }
    
    if (this.firstpano == true) {
      var startPlaying = function(){
        this.panPhoto(this.photos[0])
      }.bind(this).delay(this.options.interval)
    }
  },
  showHighlight:function(photo){
    var photo = this.photos[0];
    this.highlightThumb(photo.control,2);
    this.photos[0].descriptionCanvas.setStyle('opacity',1);
  },
  highlightThumb:function(thumb,adjustment,finalEffect) {
    effects = this.scroller.highlight.retrieve('effectInstance');
    if (!$defined(adjustment)) adjustment = 0
    if ($defined(finalEffect)) effects.onComplete = finalEffect;
    effects.start({'top':thumb.getTop()-this.scroller.imagesCanvas.getTop()-2+adjustment});
  },
  start:function() {
    
    if (this.options.editing == true) {
      return;
    }
    if (this.photos.length > 0 && this.playing == false) {
       this.playing = true;
       this.showPhoto({increment:1});
       $('pause').src = '/images/4/buttons/pause.png'
    }
  },
  pause:function() {
    if (this.playing) {
      this.stop();
    } else {
      this.start();
    }
  },
  stop:function(iflyer){
    if (this.slideTimer) {
      $clear(this.slideTimer);
      this.playing = false;
      $('pause').src = '/images/4/buttons/play.png'  
    }
  },
  injectPhoto:function(photo) {
    if (photo.injected == true) return;
    var iflyer = this;
    var marginTop = (photo.height < this.options.photoHeight) ? ((this.options.photoHeight-photo.height)/2)+'px' : '0px'
    
    if (photo.typeOf == 3) {
      // This is a 360 so needs to be handled differently
      var img = new Element('iframe', {
        id: 'iframe-viewer',
        'class': 'iframe',
        src: '',
        frameborder: 0,
        styles: {
          'height': this.options.photoHeight,
          'width': this.options.photoWidth,
          'position': 'absolute',
          'overflow':'hidden',
          'scrolling':'no',
          'left':0,
          'top':0
        }
      });
      
      img.style.allowTransparency = true
      
    } else {
      
      var img = new Element('img', {
  	    src: photo.url, 
        'class': this.options.imgClass,
        id: 'slide-cache-'+photo.id,
        styles: {
          'position': 'relative',
          'margin':'0 auto 0 auto',
          'height': photo.height, 
          'width': photo.width 
        }
      });
    }

    img.injectInside(photo.canvas)
    photo.injected = true;
    
    if (photo.typeOf == 2) {
      img.addClass('move');
      
      photo.canvas.store('panEffect', new Fx.Tween(img, {
         property: 'margin-left',
         duration: ((photo.width/1000)*10000), // 10 seconds per 1000 pixels of width
         transition: Fx.Transitions.Quad.easeInOut,
         onComplete:function(){iflyer.panPhoto(photo);}        
      }));
            
      //photo.canvas.addEvent('click',function(){
      //  photo.canvas.retrieve('panEffect').cancel();
        //$('gallery-tab-panel').setStyle('overflow','auto');
      //})
    } else if (photo.typeOf == 3) {
      
    }
    
    
    photo.canvas.store('img', img);
    photo.canvas.store('width',photo.width);
    if (photo.index == 0) {
      photo.canvas.retrieve('effectInstance').start(1);
      //this.indicator.setStyle('height',photo.canvas.retrieve('img').getHeight())
    }
    
  },
  injectThumbnails:function(){
    this.photos.each(function(photo){
      var editing = this.options.editing;
      
      photo.control = new Element('div',{
        'id': 'item'+photo.id,
        'class': 'thumb',
        styles : {
          opacity: 0,
          position: 'relative',
          overflow: 'visible'
        },
        events:{
          mouseover:function(){
            this.addClass('thumb-hover');                 
            if(editing) {
              photo.switchEl.setStyle('opacity','1');
            }
          },
          mouseout:function(){
            this.removeClass('thumb-hover');
            if(editing) {
              photo.switchEl.setStyle('opacity','0');
            }
          }
        }
      }).injectInside(this.scroller.imagesCanvas);
      
      photo.control.store('photo', photo);
      photo.control.store('effectInstance', new Fx.Tween(photo.control, {property: 'opacity', duration: 250}));
      var thumbnail = new Element('img',{
        'src': photo.thumb,
        'id': 'thumb-'+photo.id,
        'styles': { opacity: 0.4}
      }).injectInside(photo.control);
      thumbnail.store('effectInstance', new Fx.Tween(thumbnail, {property: 'opacity', duration: 250}));
      
      photo.control.store('thumbnail', thumbnail);
      
      this.injectHandle(photo);
      this.injectThumbnailDisabledIndicator(photo);      
      this.injectThumbnailSwitch(photo);
      
    }.bind(this));

    for(var i=0, length = this.photos.length; i < length; ++i) {
      this.showThumb.delay(100*i, this.photos[i]);
    }    

    this.preloadPhotos.delay(100*(length+1), this);
    
    if (this.options.editing == true) {
      


      this.sortableThumbnails = new Sortables($('thumbnail-images'), {
               clone: true,
               fxTransition: Fx.sinoidal,
               handle: 'img',
               opacity: 0.6,
               onComplete: function(){
                 var order = [];

                 this.sortableThumbnails.serialize().each(function(index){
                   if (index == 'thumbnail-selected') return;
                   order[order.length] = index.replace('item','');
                 });

                 var parameters = {'_method':'put','iflyer[photo_order]':order};
                    new Request({
                      url: '/mytours/i_flyers/'+this.options.iflyerId,
                      method: 'post',
                      data: parameters,
                      onComplete:function(){
                      }.bind(this)
                    }).send();
               }.bind(this)
              });
      
    }
    
    
    
  },
  injectHandle:function(photo){
    // photo.handle = new Element('img',{
    //       'src': '/images/iflyer/img_arrow.png',
    //       'class': 'handle',
    //       styles: {
    //         'border': 'none'
    //       }
    //     }).injectInside(photo.control)
    
    // photo.handle = new Element('div', {
    //   'class': 'handle'
    // }).set('html','Drag me').injectInside(photo.control)
    // 
  },
  injectThumbnailDisabledIndicator:function(photo){
    if (this.options.editing == false) return;
    photo.disabledIndicator = new Element('img',{
      'src': '/images/iflyer/disabled.png',
      'class': 'disabled-indicator transparent',
      styles:{
        'position': 'absolute',
        'top':(photo.control.getHeight()/2)-11,
        'left': (photo.control.getWidth()/2)-11,
        'opacity': ((this.options.editing && photo.disabled) ? '1' : '0'),
        'border': 'none'
      }
    }).injectInside(photo.control)
  },
  injectThumbnailSwitch:function(photo) {
    if (this.options.editing) {
      var width = photo.control.retrieve('thumbnail').getWidth();
      
      photo.switchEl = new Element('img', {
        'class': 'hand thumbnail-switch',
        'src': '/images/iflyer/'+((photo.disabled) ? 'enable' : 'disable' )+'.png',
        styles:{
          opacity:0,
          position:'absolute',
          right: (width < 60) ? ((72-width)/2)-37 : -35,
          top:10,
          margin:0,
          padding:0,
          border:'none'
        },
        events:{
          'click':function(){
            thumbnail = photo.control.retrieve('thumbnail');
            
            photo.disabled = !photo.disabled;
            
            this.showPhoto({id:photo.id});
            
            var parameters = {'_method':'put','photo[disabled]':photo.disabled};
            new Request({
              url: '/photos/'+photo.id,
              method: 'post',
              data: parameters,
              onComplete:function(){
              }.bind(this)
            }).send();
            
            if (photo.disabled) {
              photo.switchEl.set('src','/images/iflyer/enable.png');

              this.disabledPhotoIndicator.setStyles({'display':'block',
                'position':'relative',
                'width':$('gallery-tab-panel').getWidth(),
                'height': photo.height,
                'z-index': 50000000           
              });           
              this.disabledPhotoIndicator.setStyle('opacity','0.6');              
              
              photo.control.retrieve('thumbnail').tween('opacity',1,0.6)
              photo.disabledIndicator.tween('opacity',0,1);
            } else {
              photo.switchEl.set('src','/images/iflyer/disable.png');
              
              this.disabledPhotoIndicator.setStyle('display','none');
              this.disabledPhotoIndicator.setStyle('opacity',1,0);
              
              photo.control.retrieve('thumbnail').tween('opacity',0.4,1);
              photo.disabledIndicator.tween('opacity',1,0);
            }
            
          }.bind(this)
        }
      }).injectInside(photo.control);
    }
  },
  showHeadshotForm:function(){
    $('face-click').setStyle('display','none');
    $('face-form').setStyle('display','block');
    $('face-form').tween('opacity',0,1);
  },
  removeHeadshot:function() {
    $('headshot_img').setStyle('display','none');
    $('face_stub').setStyle('display','block');
    $('face_stub').tween('opacity',0,1);
    
    new Request({
    	url: '/mytours/i_flyers/'+this.options.iflyerId,
    	method: 'post',
    	data: {'iflyer[headshot]': '', '_method':'put'},
    	evalScripts: true,
    	onComplete: function(response){
    	}
    }).send();
  },
  refreshHeadshot:function(image, id) {
    new Request({
    	url: '/mytours/i_flyers/'+this.options.iflyerId,
    	method: 'get',
    	data: {partial: 'headshot'},
    	evalScripts: true,
    	onComplete: function(response){
    	  $('headshot').set('html',response);
    	}
    }).send();
  },  
  showLogoForm:function(){
    $('logo-click').setStyle('display','none');
    $('logo-form').setStyle('display','block');
    $('logo-form').tween('opacity',0,1);
  },
  removeLogo:function() {
    $('logo_img').setStyle('display','none');
    $('logo_stub').setStyle('display','block');
    $('logo_stub').tween('opacity',0,1);
    
    new Request({
    	url: '/mytours/i_flyers/'+this.options.iflyerId,
    	method: 'post',
    	data: {'iflyer[logo]': '', '_method':'put'},
    	evalScripts: true,
    	onComplete: function(response){
    	}
    }).send();
  },
  refreshLogo:function(image, id) {
    new Request({
    	url: '/mytours/i_flyers/'+this.options.iflyerId,
    	method: 'get',
    	data: {partial: 'logo'},
    	evalScripts: true,
    	onComplete: function(response){
    	  $('agent-logo-canvas').set('html',response);
    	  new InlineEditable({id:'iflyer-logo-url',obj:'iflyer',field:'logo_url',update_url:'/mytours/i_flyers/'+this.options.iflyerId,default_text:'URL Link'});        
    	}
    }).send();
  },    
  activateThumbnail:function(){
    var thumbnail = this.control.retrieve('thumbnail');
    
    if (this.disabled == false) {
      thumbnail.retrieve('effectInstance').start(0.4,1);
    } else {
      thumbnail.retrieve('effectInstance').start(0.4,0.6);
    }
    
    thumbnail.addEvent('click', function(){ 
      
      if (!$('gallery-tab').hasClass('active')) {
        $('gallery-tab').fireEvent('click'); 
      } else {
        var options = {id:this.id};
        this.iflyer.stop(); 
        this.iflyer.showPhoto(options);
      }      
      
    }.bind(this));
  },
  showPhoto:function(options) {    
    var index = 0;
    if ($defined(options.index) && options.index == this.active) {
      return;
    } else if ($defined(options.id)) {
      var photo = this.findPhotoById(options.id);
      index = photo.index;
    } else if ($defined(options.increment)) {
      direction = this.active+options.increment;
      if (direction < 0) {
        index = this.photos.length-1;
      } else if (direction >= this.photos.length) {
        index = 0;
      } else {
        index = direction;
      }
    } else if (options.index) {
      index = options.index;
    }

    if (index == this.active) return;
    
    var current = this.photos[this.active];

    if (((this.playing == true) || (this.editMode == false)) && this.photos[index].disabled == true) { 
      return this.showPhoto({index:index+1}); 
    }
    
    this.active = index;
    var next = this.photos[this.active];
    
    this.photos.each(function(photo,i){
      if (next.canvas.retrieve('img')) {
        if ((i != current.index) || (next.canvas.retrieve('img').getHeight() != current.canvas.retrieve('img').getHeight())) {
          this.photos[i].canvas.retrieve('effectInstance').set(0)
        }        
      }
    }.bind(this));

    if (next.canvas.retrieve('img')) {
      new Fx.Elements([this.scroller.highlight], {
        onComplete: function(){
          this.scroller.adjustScreen(index);
          current.descriptionCanvas.setStyle('opacity',0);
          next.descriptionCanvas.setStyle('opacity',1);
        
          if (next.index < current.index) {
            next.canvas.setStyle('opacity',1);
            if (next.canvas.retrieve('img').getHeight() == current.canvas.retrieve('img').getHeight()) {
              current.canvas.retrieve('effectInstance').start(1,0);
            }
          } else {
            next.canvas.retrieve('effectInstance').start(1);
          }
              
         $('gallery-tab-panel').style.height = next.canvas.retrieve('img').getHeight()+'px';
       
         $('gallery-panel-indicator').setStyle('opacity',1);
      
         if (current.typeOf == 2) { current.canvas.retrieve('panEffect').cancel();}
       
         if (next.typeOf == 2) {
           this.stop();
           next.canvas.retrieve('img').setStyle('margin-left',0);
           this.panPhoto(next);
         }

         if (next.typeOf == 3) {
           this.stop();
           $('gallery-panel-indicator').setStyle('opacity',0);
           if (!$defined(next.loaded)) {
             next.canvas.retrieve('img').src = "http://images.vicaso.net/i_flyer/panorama/"+next.id+".html";
             next.loaded = true;
           }
         }
       
       
         if (this.options.editing) {
           if (photo.disabled == true) {
             this.disabledPhotoIndicator.setStyles({'display':'block',
               'width':$('gallery-tab-panel').getWidth(),
               'height': photo.height             
             });           
             this.disabledPhotoIndicator.setStyle('opacity','0.6');
           } else {
             this.disabledPhotoIndicator.setStyle('display','none')
             this.disabledPhotoIndicator.setStyle('opacity','0');
           }

         }
           
         if (this.playing == true) {
           this.slideTimer = this.slideTimerFunction.delay(this.options.interval);
         }    
    
        }.bind(this)
      }).start({'0': {top: next.control.getTop()-this.scroller.imagesCanvas.getTop()}});
    } else {
      this.active = this.active - 1;
      this.slideTimer = this.slideTimerFunction.delay(this.options.interval);
    }
  },
  panPhoto:function(photo) {
    this.stop();
    //$('gallery-tab-panel').setStyle('overflow','hidden');
    var image = photo.canvas.retrieve('img');
    var left = image.getStyle('margin-left');
    var end = (left == '' || left == '0px') ? ((photo.canvas.retrieve('width')-this.options.photoWidth)*-1) : 0;
    photo.canvas.retrieve('panEffect').start(left,end);
    return photo;
  },
  showThumb:function() {
    this.control.retrieve('effectInstance').start(0,1);
  },
  findPhotoById:function(id) {
    id = (id+'').replace('thumb-','');
    var length = this.photos.length;
    var photo = null;
    for(i=0;i<length;i++) {
      photo = this.photos[i];
      if (id == photo.id) { break; }
    }
    return photo;
  },
  initializeTabs:function() {
    var iflyer = this;
    this.tabs = $$('#menu div');
    
    this.tabs.each(function(tab){
      var panel = $(tab.id+'-panel');
      tab.loaded = false;
      
      if (tab.id != this.options.galleryTabId) {
        panel.setStyle('opacity',0);
      } else {
        tab.loaded = true;
        tab.addClass('active');
      }
            
      tab.store('panel',panel);
      tab.addEvents({click:function(el){ 
        if (tab.id != 'gallery-tab') {
          this.stop();
        } else {
          this.start()
        }
        this.showTab(tab); 
      return false;}.bind(this)});
    }.bind(this));
  },
  showTab:function(tab){
    this.hideTabs();
    tab.retrieve('panel').setStyles({'opacity':1,'z-index':1});
    tab.addClass('active');
    
    this.currentTab = tab;
    
    if (tab.loaded == false) {
      if (tab.id == 'map-tab') { $('map-iframe').src = "?tab=map&editing="+this.options.editing; }
      tab.loaded = true;
    }
  },
  hideTabs:function(){
    this.tabs.each(function(tab){
      tab.retrieve('panel').setStyles({'opacity':0,'z-index':0});
      tab.removeClass('active');
    });
  }
});

var SortableFeature = new Class({
  Implements: [Events, Options],
  options: {
    iflyerId:'',
    addText:'',
    updateURL:''
  },
  initialize: function(options) {
    this.setOptions(options);
    this.html = $(this.options.id);

    this.options.updateURL = '/mytours/i_flyers/'+this.options.iflyerId;
    this.featureCount = 0;
    
    this.sortable = new Sortables(this.html, {
    	clone: true,
    	opacity: 0.6,
    	handle:'sort-arrow',
    	onComplete: function(){
    	  var order = [];
    	  this.sortable.serialize().each(function(index){
    	    order[order.length] = index.replace('f-','');
    	  });
    		var parameters = {'_method':'put','iflyer[features_order]':order};
    		
    		new Request({
        	url: this.options.updateURL,
        	method: 'post',
        	data: parameters,
        	evalScripts: true,
        	onComplete: function(){
        	}
        }).send();

    	}.bind(this)
    });

    this.initializeItems();
//    <%= sortable_element('features_list', :url => {:action => 'features_order', :id => iflyer}) %>
    // Comment this to remove the ability to add new features
    this.form = new Element('a',{
          events:{
            click:function(){
              this.addItem();
            }.bind(this)
          }
        }).set('html',this.options.addText).inject(this.html,'after');
    
  },
  addItem:function() {
    this.featureCount++;
    var li = new Element('li', {
      'id': 'f-'+this.featureCount
    }).injectInside(this.html,'bottom')
    
    var span = new Element('span',{
      'id': 'feature'+this.featureCount
    }).set('html','Enter text').injectInside(li);    
    
    this.initializeItem(li);
    span.fireEvent('click');
  },
  initializeItems:function() {
    this.items = $$('#'+this.options.id+' li');
    if ($chk(this.items)) {
      this.items.each(function(item){
        this.initializeItem(item);
      }.bind(this));
    }

  },
  initializeItem:function(item){
    var arrow = this.sortArrow().injectInside(item);  
    item.store('arrow',arrow);
    this.attachEvents(item);
    var id = (this.featureCount == 0) ? 0 : this.featureCount-1;
    options = {id:'feature'+id,obj:'i_flyer',field:'features',update_url:'/i_flyers/'+this.options.iflyerId,sortable:this.sortable}
    new InlineEditable(options);
  },
  attachEvents:function(item) {
    item.addEvents({
      mouseover: function(){item.retrieve('arrow').tween('opacity',0,1)}.bind(this),
      mouseout: function(){item.retrieve('arrow').tween('opacity',1,0)}.bind(this)
    })
  },
  sortArrow:function(){
    var arrow = new Element('img',{
      'class': 'transparent sort-arrow',
      'src': '/images/inplace/arrow.png',
      'id': 'sortable-feature-arrow'+this.featureCount,
      'opacity':0
    });
    this.featureCount += 1;
    return arrow;
  }
});

var Preloader = new Class({
  Implements: [Events, Options],
  options: {
      root    : '',
      period  : 100
    },
    initialize: function(options){
      this.setOptions(options);
    },
    load: function(sources) {
      this.index = 0;
      this.images = [];
      this.sources = this.temps = sources;
      this.total = this. sources.length;

      this.fireEvent('onStart', [this.index, this.total]);
      this.timer = this.progress.periodical(this.options.period, this);

      this.sources.each(function(source, index){
        this.images[index] = new Asset.image(this.options.root + source, {
          'onload'  : function(){ this.index++; if(this.images[index]) this.fireEvent('onLoad', [this.images[index], index, source]); }.bind(this),
          'onerror' : function(){ this.index++; this.fireEvent('onError', [this.images.splice(index, 1), index, source]); }.bind(this),
          'onabort' : function(){ this.index++; this.fireEvent('onError', [this.images.splice(index, 1), index, source]); }.bind(this)
        });
      }, this);
    },

    progress: function() {
      this.fireEvent('onProgress', [Math.min(this.index, this.total), this.total]);
      if(this.index >= this.total) this.complete();
    },

    complete: function(){
      $clear(this.timer);
      this.fireEvent('onComplete', [this.images]);
    },

    cancel: function(){
      $clear(this.timer);
    }

  });


var iFlyerScroller = new Class({
  Implements: [Events, Options],
  options: {
    imageCount:0,
    imageHeight:55
  },
  initialize: function(options){
    this.setOptions(options);
    this.element = $('thumbnails');
    this.highlight = $('thumbnail-selected');
    this.imagesCount = this.options.imageCount;
    this.currentScreen = 0;
    this.scrollable = true;
    
    this.options.imageHeight = this.options.imageHeight+2;
    
    this.imagesScroller = $('scroller');
    this.down = $('scroller-down');
    this.up = $('scroller-up');
    this.imagesCanvas = $('thumbnail-images');
    
    this.height = this.imagesScroller.getHeight();

    this.movement = new Fx.Morph(this.imagesCanvas,{
                                    duration:1000,
                                    link: 'ignore',
                                    transition:Fx.Transitions.Sine.easeOut,
                                    onStart: function() {this.scrollable = false;}.bind(this),
                                    onComplete: function() {this.scrollable = true;}.bind(this)
                                  });
                                      
    this.totalScreens = Math.floor(this.options.imageHeight * this.imagesCount/this.height);

    this.imagesPerScreen = Math.round(this.height / this.options.imageHeight);

    this.highlight.store('effectInstance',new Fx.Morph(this.highlight,{duration:1000,transition: Fx.Transitions.Cubic.easeOut}));
    
    this.up.addEvents({
      mouseover:function(){this.scrollCanvas('up');}.bind(this),
      click:function(){this.scrollCanvas('up');}.bind(this)
    });
    
    this.down.addEvents({
      mouseover:function(){this.scrollCanvas('down');}.bind(this),
      click:function(){this.scrollCanvas('down');}.bind(this)
    });
  },
  scrollCanvas:function(direction) {
    if (this.scrollable == true) {
      if (direction == 'up') {
        if ((this.currentScreen < this.totalScreens)) {
          this.currentScreen++;
          this.movement.start({top:-this.height*this.currentScreen+2});
        }        
      } else {
        if (this.currentScreen > 0) {
          this.currentScreen--;
          this.movement.start({top:-this.height*this.currentScreen+2})
        }
      }
    }
  },
  adjustScreen:function(thumbnailIndex) {    
    var thumbnailScreen = Math.floor(thumbnailIndex/this.imagesPerScreen);
    if (thumbnailIndex == 0) {
      this.restart();
    } else if (thumbnailScreen > this.currentScreen) {
      this.scrollCanvas('up');
    } else if (thumbnailScreen < this.currentScreen) {
      this.scrollCanvas('down');  
    }
  },
  restart:function() {
    this.movement.start({top:0});
    this.currentScreen = 0;
  },
  clicked:function() {
    this.addClass('clicked');
    setTimeout(function(){this.removeClass('clicked');},150);
  }
});

var InlineEditable = new Class({
  Implements: [Events, Options],
  options: {
    id: '',
    obj: '',
    field: '',
    update_url: '',
    limit:5000,
    type: 'text',
    ok_button_url:'/images/03/buttons/ok.png',
    cancel_button_url:'/images/03/buttons/cancel.png',
    indicator_button_url:'/images/03/buttons/inline-indicator.gif',
    default_text:'Enter text',
    start_highlight_color: '#960606',
    end_highlight_color: '#333333',
    oncomplete: '',
    sortable:null
  },
  initialize: function(options) {
    this.setOptions(options);
    this.container = $(this.options.id);
    this.container.addClass('inline-editable');
    this.content = this.container.get('html');
    
    if (this.content.trim().length <= 0) { 
      this.content = this.options.default_text; 
      this.container.set('html',this.content); 
    }
    this.type = this.options.type;
    this.background_color = this.container.getStyle('backgroundColor');
    this.parameter = this.options.obj+'['+this.options.field+']';
    
    this.add_hover_effects();
    this.container.addEvent('click', function(e){
      this.insertInput();
      if ($chk(this.options.sortable)) {
        if ($chk(e)) e.stopPropagation();
        this.options.sortable.detach();
      }
    }.bind(this));
  },
  insertInput:function() {
      this.container.set('html','');
    
      var wrapper = new Element('div',{
        'class': 'text-editor-field-wrapper',
        styles: {
          'position':'relative',
          'opacity':0,
          'z-index':10000
        }
      });
      
      this.container.removeClass('inline-editable');
      
      var input = this.element_for_type(this.type,this.container);

      wrapper.inject(this.container);
      input.inject(wrapper);
      
      if (this.type == 'text') {
        input.addEvent('keyup', function(event){
          if (event.key == 'enter') { 
          	ok.fireEvent('click',event);
          } else {
            if (input.value.length > this.options.limit) {
              input.value = input.value.substring(0,this.options.limit);
            }
          };
        }.bind(this));
      }
      
      var button_wrapper = new Element('div',{'class': 'text-editor-button-wrapper'}).inject(wrapper);        
      var ok = new Element('img',{'src':this.options.ok_button_url,'class':'text-editor-ok'}).inject(button_wrapper);
      var cancel = new Element('img',{'src':this.options.cancel_button_url,'class':'text-editor-cancel'}).inject(button_wrapper);
      
      ok.addEvent('click', function(event) {
        editor = this;
        ok.set('src',this.options.indicator_button_url);
        
        parameters = {};
        parameters['_method'] = 'put';
        parameters[this.parameter] = (input.value == this.options.default_text) ? '' : input.value;
        
        new Request({
        	url: this.options.update_url,
        	method: 'post',
        	data: parameters,
        	evalScripts: true,
        	onComplete: function(){        	  
        	  if (input.hasClass('text-editor-field')) {
        	    editor.content = (input.value.trim().length > 0) ? input.value.replace(/\n/g,'<br/>').trim() : editor.options.default_text.trim();
        	  } else {
        	    editor.content = (input.value.trim().length > 0) ? input.value.trim() : editor.options.default_text.trim();
        	  }
        	  cancel.fireEvent('click',event);
        	  eval(editor.options.oncomplete);
        	}
        }).send();
      }.bind(this));
              
      cancel.addEvent('click', function(event) {
				wrapper.destroy();
				this.container.set('html',this.content.trim());
				this.container.addClass('inline-editable');
				this.add_hover_effects();
				event.stop();
        this.container.addEvent('click', this.insertInput.bind(this));
                
        if ($chk(this.options.sortable)) { this.options.sortable.attach() }
			}.bind(this));
              
      wrapper.tween('opacity',0, 1);
      this.container.removeEvents();
      var select_me = function(){input.select();};   
      select_me.delay(100);
  },
  element_for_type:function(type,container) {
    if (type == 'text') {
      return this.input_text_element(container);
    } else if (type == 'textarea') {
      return this.input_textarea_element(container);
    }
  },
  input_textarea_element:function(container) {
    var dimensions = container.getSize();
    var height = (dimensions.y == 0) ? container.getStyle('line-height') : dimensions.y;
    var content = this.content.replace(/<br>/g,'\n').replace(/<br\/>/g,'\n').replace(/<BR>/g,'\n').trim();

    var el = new Element('textarea',{
      'class':'text-editor-field',
      styles: {
        'height': height-45,
        'width': '100%',
        'color': '#232323',
        'background': '#EBEBEB',
        'position': 'relative',
        'z-index': 10001
      }
    });
    
    el.value = content;
    
    return el;
  },
  input_text_element:function(container) {
    var dimensions = container.getSize();
    height = (dimensions.y == 0) ? container.getStyle('line-height') : dimensions.y;
    
    return new Element('input', {
      type: 'text',
      value: this.content.trim(),
      'class':'text-editor-field',
      styles: {
        'height': height,
        'width': '100%',
        'color': '#232323',
        'background': '#EBEBEB',
        'position': 'relative',
        'text-align': container.style.textAlign,
        'font-family': container.style.fontFamily,
        'z-index': 10001
      }
    });
  },
  add_hover_effects:function() {
    var end_background = (this.background_color != 'transparent') ? this.background_color : this.options.end_highlight_color;
    var start_background = this.options.start_highlight_color;
    this.tween_highlight = function(event) {event.target.highlight(start_background,end_background);}
    this.container.addEvent('mouseover', this.tween_highlight);
    
  }
});


var Tooltip = new Class({
  Implements: [Events, Options],
  options: {
    id:'',
    content:''
  },
  initialize: function(options) {
    this.setOptions(options);    
    this.attachWrapperEvents();
    this.buildHTML();
  },
  show:function() {
    this.html.tween('opacity',0,1);
  },
  hide:function() {
    this.html.tween('opacity',1,0);
  },
  follow:function(e) {
    this.html.setStyle('top',e.page.y+15);
    this.html.setStyle('left',e.page.x-30);
  },
  attachWrapperEvents:function() {
    $('tooltip-wrapper'+this.options.id).addEvents({
      mouseover: function(){this.show();}.bind(this),
      mouseout: function(){this.hide();}.bind(this),
      mousemove: function(e){this.follow(e)}.bind(this)
    });
  },
  buildHTML:function() {
    this.html = new Element('div', {
                                  'id': 'tooltip'+this.options.id,
                                  'class': 'tooltips',
                                  'opacity': 0
                                }).injectInside(document.body);

    this.html.set('tween',{duration: 'short'});
                                
    var top = new Element('div', {'class':'top png'}).injectInside(this.html);
    new Element('div', {'class':'tooltip-content'}).set('html',this.options.content).injectInside(top)
    new Element('div', {'class':'bottom png'}).set('html','&nbsp;').injectInside(this.html);
  }
});

var VicasoForm = new Class({
  Implements: [Events, Options],
  options: {
    id:''
  },
  initialize: function(options) {
    this.setOptions(options);
    this.rows = $$('#'+this.options.id+' li');
    this.tooltips = $$('#'+this.options.id+' .tooltip');
    this.fields = $$('#'+this.options.id+' .text');
    
    this.initializeFocus();
    this.initializeTooltips();
  },
  initializeTooltips:function(){
    this.tooltips.each(function(tooltip){ tooltip.setStyle('opacity',0);});
    this.rows.each(function(row){
      //var tween = new Fx.Tween(row.id.replace('-li','')+'-tooltip',{property:'opacity',duration:'short'})
      // row.addEvents({
      //         mouseover:function(){tween.start(0,1)},
      //         mouseout:function(){tween.start(1,0)}
      //       });
      
      row.addEvents({
        mouseover:function(){$(row.id.replace('-li','')+'-tooltip').setStyle('opacity',1)},
        mouseout:function(){$(row.id.replace('-li','')+'-tooltip').setStyle('opacity',0)}
      });
      
    });
  },
  initializeFocus:function(){
    this.fields.each(function(field){
      field.addEvent('click',function(){
        this.rows.each(function(row){row.removeClass('focused');})
        field.getParent('li').addClass('focused');          
      }.bind(this));
    }.bind(this));
  }
});

var Overlay = new Class({
  Implements: [Events, Options],
  options: {
    opacity:0.7,
    zIndex: 50000,
    click: $empty
  },
  initialize: function(options) {
    this.setOptions(options);        
    this.injectOverlay();        
    this.container.addEvent('click', function(){
      this.hide();
      this.options.click();
    }.bind(this));
    this.position();        
    window.addEvent('resize', this.position.bind(this));
  },
  show:function(){
    this.container.tween('opacity',0,this.options.opacity);
  },
  hide:function(){
    this.container.tween('opacity',this.options.opacity,0);
  },
  position:function() {
    this.container.setStyles({'top': 0, 'height': window.getScrollHeight()}); 
  },
  injectOverlay:function() {

    this.container = new Element('div',{'class': 'overlay-container',styles:{'opacity':0}}).injectInside(document.body);
    
    this.overlay = new Element('div',{'class': 'overlay'}).injectInside(this.container);        
  }
});

var ShareBox = new Class({
  Implements: [Events, Options],
  options: {
    content:'',
    width:588
  },
  initialize: function(options) {
    this.setOptions(options);
    this.overlay = new Overlay({'opacity':0.7,'click':function(){this.close();}.bind(this)});
    this.injectContent();        
  },
  show:function(content_id,iflyer_id) {
    iflyer.stop();
    this.overlay.show();
    
    if (content_id) {
     
      if (this.cached_id) {
        $(this.cached_id+'-content').set('html',this.frame.get('html'));
      } 
               
      this.cached_id = content_id;
      this.frame.set('html',$(content_id+'-content').get('html'));
      $(content_id+'-content').set('html','');
      
      if (content_id == 'embed') {
        new Request({
          async:true,
        	url: '/'+iflyer_id,
        	data: { 'print' : 'true', 'embed' : 'true' },
        	method: 'post',
        	onRequest: function() { $('embed-code').value = 'Loading code...'; },
          onComplete: function(response) { $('embed-code').value = response; }
        }).send();
      }
      
      
    }            
    
    this.content.setStyle('display','block');
    
    size = this.content.getSize();
    
    this.top.setStyle('width',size.x-70);
    this.bottom.setStyle('width',size.x-70);
    this.top.setStyle('margin','0 35px');
    this.bottom.setStyle('margin','0 35px');
    
    this.position();
  },
  close:function() {
    this.overlay.hide();
    this.content.setStyle('display','none');
  },
  injectContent:function(){        
    this.content = new Element('div',{'class':'modal-content'}).injectInside(document.body);
    
    this.top = new Element('div',{'class': 'modal-top','position':'relative'}).injectInside(this.content);
    new Element('img',{src:'/images/03/iflyer/modal-nw.png',styles:{'position':'absolute','left':0,'top':0}}).injectInside(this.top);
    new Element('img',{src:'/images/03/iflyer/modal-ne.png',styles:{'position':'absolute','right':0,'top':0}}).injectInside(this.top);

    this.closeButton = new Element('img',{src:'/images/icons/close.png',styles:{'position':'absolute','right':20,'top':20}}).injectInside(this.content);
    this.closeButton.addEvent('click',function(){this.close();}.bind(this));

    this.frame = new Element('div',{ styles: {'border':'none','margin':'0','background':'#333'}}).set('html',$('share-content').get('html')).injectInside(this.content);
    
    this.bottom = new Element('div',{'class': 'modal-bottom'}).injectInside(this.content);
    new Element('img',{src:'/images/03/iflyer/modal-sw.png',styles:{'position':'absolute','left':0}}).injectInside(this.bottom);
    new Element('img',{src:'/images/03/iflyer/modal-se.png',styles:{'position':'absolute','right':0}}).injectInside(this.bottom);
    
    this.position()
    
    //this.content.set('html','hello world');
    
    //window.addEvent('resize', this.position.bind(this));
  },
  position:function(){;
    var coords = $('photos').getCoordinates();
    var dimensions = $('gallery-tab-panel').getSize();
    var contentDimensions = this.content.getSize();

    this.content.setStyles({
      'top':(coords.top+(dimensions.y/2))-(contentDimensions.y/2),
      'left':coords.left+((dimensions.x-contentDimensions.x)/2)
    })
  }
});


function checkSite(img,site) {
  if (img.src.indexOf('-checked') > 1) {
    img.src = '/images/03/buttons/checkbox.gif';
    $(site+'-checkbox').checked = false;
  } else {
    img.src = '/images/03/buttons/checkbox-checked.gif';
    $(site+'-checkbox').checked = true;
  }
}

function syndicate() {
  var form = $('syndicate-form');
  $('syndicate-flash').set('html','<img src="/images/03/iflyer/ajax-loader.gif" />')
  
  form.set('send', {
    onComplete: function(response) { 
    $('syndicate-flash').set('html','');
    $('syndicate-confirmation').set('html',response);
     } 
  });
  
  form.send();
}

function show_iframe(){
  if ($('map-iframe')) {$('map-iframe').tween('opacity',0,1);}
}