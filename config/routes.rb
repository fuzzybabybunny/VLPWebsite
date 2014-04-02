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

  # FRONT END ORDER SUBMISSION FORM
  get "prices"  => "order_forms#prices"
  resources :order_forms
  # get 'order_forms/:id/delete'  => 'order_forms#delete', as: :delete_order_form

  # BACKEND ROUTING
  get 'admin'   => 'backend#index'
  get 'backend' => 'backend#index'

  # REGISTERING USERS AND USER LEVELS
  get   'super_registration'  =>   'backend#super_registration'
  post  'super_register'      =>   'registrations#registration'

  # CRUD and ORDER_SUBMISSIONS
  resources :order_submissions
  get 'order_submissions/:id/delete'  => 'order_submissions#delete', as: :delete_order_submission

  # LOGIN / LOGOUT ROUTING
  get     'login'     => 'session#new'
  post    'login'     => 'session#create'
  delete  'logout'    => 'session#destroy'
  get     'logout'    => 'session#destroy' # delete before deployment

  # RESET PASSWORD ROUTING
  get     'reset/:code' => 'password#edit', as: :reset
  put     'reset/:code' => 'password#update'
  patch   'reset/:code' => 'password#update'

end
