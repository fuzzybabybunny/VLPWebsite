class OrderSubmissionsController < ApplicationController

  before_action :is_authenticated?
  before_action :get_current_order_submission, except: [ :index, :new, :create, :admin ]
                                              # only: [ :show, :edit, :update, :destroy]
  layout "site"

  def index
    @users = User.all.entries
    @order_submissions = OrderSubmission.order("created_at ASC").page(params[:page]).per(5)
  end

  def prices
  end

  def create
    @order_submission = OrderSubmission.create(order_submission_params)
    redirect_to index_url
  end

  def show
  end

  def new

  end

  def edit
  end

  def update

    if @order_submission.update_attributes(order_submission_params)
      redirect_to order_submission_path
    else
      render :edit
    end

  end

  def delete
  end

  def destroy
    @order_submission.destroy
    redirect_to order_submissions_path
  end

  private

  def get_current_order_submission
    @order_submission = OrderSubmission.find( params[:id] )
  end

  def order_submission_params
    params.require(:order_submission).permit(
    :sqft, :agentFirstName, :agentLastName, :agentEmail,
    :agentPhone, :otherEmail, :address1Prop,
    :address2Prop, :city, :state, :zipcode, :hdrPhotos,
    :panoramas, :spw, :domain, :domainURL, :preliminaryPhotos,
    :fullVideo, :fullTwilightVideo, :videoClips, :twilightVideoClips,
    :access, :date, :time, :referral, :notes, :vendor)
  end

end
