class BackendController < ApplicationController
  before_action :is_authenticated?

  layout "site"

  def index
    @users = User.all.entries
    @order_submissions = OrderSubmission.all.entries
  end

end