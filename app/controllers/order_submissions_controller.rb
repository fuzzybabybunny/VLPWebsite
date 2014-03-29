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
    @order_submission = OrderSubmission.new
  end

  def edit
    @order_submission = OrderSubmission.find( params[:id] )
  end

  def update

    # Find an existing order submission
    @order_submission = OrderSubmission.find( params[:id] )
    # Update the order submission
    if @order_submission.update_attributes(order_submission_params)
      redirect_to(:action => 'show', :id => @order_submission.id)
    else
      render :edit
    end

  end

  def delete
    @order_submission = OrderSubmission.find( params[:id] )
  end

  def destroy
    @order_submission = OrderSubmission.find( params[:id] ).destroy
    redirect_to(:action => 'index')
  end

  private

  def order_submission_params
    params.require(:order_submission).permit(
      :agentFirstName, :agentLastName, :agentEmail, :agentPhone,
      :otherEmail, :address1Prop, :address2Prop, :city,
      :state, :zipcode, :sqft)
  end

end
