class BackendController < ApplicationController
  before_action :is_authenticated?
  before_action :get_current_order_submission, except: [ :index, :new, :create, :admin ]

  layout "site"

  def index
    @users = User.all.entries
    @order_submissions = OrderSubmission.all.entries
  end

  def show
  end

  def new
    @order_submission = OrderSubmission.new
  end

  def create
    @order_submission = OrderSubmission.new( order_submission_params )

    if @order_submission.save
      redirect_to order_url( @order_submission )
    else
      flash.now[:alert] = @order_submission.errors
      render :new
    end
  end

  def edit
    @current_order_submission = OrderSubmission.find( params[:id] )
  end

  def update
    if @order_submission.update_attributes( prder_submission_params )
      redirect_to order_submission_url( @order_submission)
    else
      flash.now[:alert] = @order_submission_errors
      render :edit
    end
  end

  def destroy
    @order_submission.destroy
    redirect_to order_submissions_url, notice: "Deleted #{@order_submission.address1Prop}."
  end

  private

  def get_current_order_submission
    @current_order_submission = OrderSubmission.find( params[:id] )
  end

  def order_submission_params
    params.require(:order_submission).permit(
      :agentFirstName, :agentLastName, :agentEmail, :agentPhone,
      :otherEmail, :address1Prop, :address2Prop, :city,
      :state, :zipcode, :sqft)
  end



end