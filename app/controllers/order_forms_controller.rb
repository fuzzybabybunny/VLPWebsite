class OrderFormsController < ApplicationController

  layout "site"

  def index
  end

  def prices
    redirect_to order_forms_url
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
  end

  def delete
  end

  def destroy
  end

  private

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
