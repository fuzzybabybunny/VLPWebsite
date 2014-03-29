class OrderSubmissionsController < ApplicationController

  before_action :is_authenticated?
  # before_action :get_current_order_submission, except: [ :index, :new, :create, :admin ]

  layout "site"

  def index
    @users = User.all.entries
    @order_submissions = OrderSubmission.order("created_at ASC")
  end

  def show
    @order_submission = OrderSubmission.find( params[:id] )
  end

  def new
  end

  def edit
    @order_submission = OrderSubmission.find( params[:id] )
  end

  def delete
    @order_submission = OrderSubmission.find( params[:id] )
  end

  def destroy
    @order_submission = OrderSubmission.find( params[:id] ).destroy
    redirect_to(:action => 'index')
  end

end
