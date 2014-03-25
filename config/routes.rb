VLPRails::Application.routes.draw do

  # site is the name of our controller, index is in layouts/site
  # and defined in controller
  root 'site#index'

  get 'index' => 'site#index'
  get 'images' => 'site#images'
  get 'videos' => 'site#videos'
  get 'single-property-websites' => 'site#single-property-websites'
  get 'technique' => 'site#technique'
  get 'prices' => 'site#prices'
  get 'testimonials' => 'site#testimonials'
  get 'about' => 'site#about'
  get 'contact' => 'site#contact'
  get 'register' => 'site#register'

  get 'login' => 'session#new'
  post 'login' => 'session#create'
  delete 'logout' => 'session#destroy'

  get 'logout' => 'session#destroy' # delete before deployment

  get 'privacy' => 'site#privacy'
  get 'terms' => 'site#terms'

  get 'privacy/stuff' => 'site#stuff'

  get 'reset/:code' => 'password#edit', as: :reset
  put 'reset/:code' => 'password#update'
  patch 'reset/:code' => 'password#update'

  get 'order' => 'site#order'

  get 'newsite' => 'newsite#index'

end
