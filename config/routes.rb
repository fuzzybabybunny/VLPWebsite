VLPRails::Application.routes.draw do

  # site is the name of our controller, index is in layouts/site
  # and defined in controller
  root 'site#index'

  # MAIN SITE ROUTING
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
  get 'order' => 'site#order'

  # ORDER SUBMISSION FORM
  post    'order'     =>  'order_submissions#create_order'
  patch   'order/edit' =>  'order_submissions#edit_order'

  # LOGIN / LOGOUT ROUTING
  get 'login' => 'session#new'
  post 'login' => 'session#create'
  delete 'logout' => 'session#destroy'
  get 'logout' => 'session#destroy' # delete before deployment

  get 'admin' => 'backend#index'

  # RESET PASSWORD ROUTING
  get 'reset/:code' => 'password#edit', as: :reset
  put 'reset/:code' => 'password#update'
  patch 'reset/:code' => 'password#update'

  # TEST
  get 'newsite' => 'newsite#index'

end
