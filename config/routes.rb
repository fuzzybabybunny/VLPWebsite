VLPRails::Application.routes.draw do

  # site is the name of our controller, index is in layouts/site
  # and defined in controller
  root 'site#index'

  # MAIN SITE ROUTING
  get 'index'         => 'site#index'
  get 'images'        => 'site#images'
  get 'videos'        => 'site#videos'
  get 'spw'           => 'site#single-property-websites'
  get 'technique'     => 'site#technique'
  get 'testimonials'  => 'site#testimonials'
  get 'about'         => 'site#about'
  get 'contact'       => 'site#contact'
  get 'register'      => 'site#register'

  # BACKEND ORDER EDIT FORM
  # post    'order'     =>  'backend#create'
  # patch   'order' => 'backend#search' #, as: :charsearch

  # FRONT END ORDER SUBMISSION FORM

  get "prices"              => "order_form#prices"

  resources :order_form
  get 'order_form/:id/delete'  => 'order_form#delete', as: :delete_order_form
  # get "order-form/index"    => "order_form#index", as: :order
  # get "order_form/show"
  # get "order_form/new"
  # get "order_form/edit"
  # get "order_form/delete"
  # post "order_submissions"  => "order_submissions#create"


  # LOGIN / LOGOUT ROUTING
  get     'login'     => 'session#new'
  post    'login'     => 'session#create'
  delete  'logout'    => 'session#destroy'
  get     'logout'    => 'session#destroy' # delete before deployment

  # BACKEND ROUTING
  get 'admin' => 'backend#index'

  # RESET PASSWORD ROUTING
  get     'reset/:code' => 'password#edit', as: :reset
  put     'reset/:code' => 'password#update'
  patch   'reset/:code' => 'password#update'

  # CRUD and ORDER_SUBMISSIONS

  resources :order_submissions
  get 'order_submissions/:id/delete'  => 'order_submissions#delete', as: :delete_order_submission


  match ':controller(/:action(/:id))', :via => :get

end
