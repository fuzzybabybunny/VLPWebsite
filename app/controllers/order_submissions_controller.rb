class OrderSubmissionsController < ApplicationController

  def create_order
    # make it save here
    OrderSubmissions.create order_params
    redirect_to order_url
  end

  def order_read
    @order = OrderSubmissions.all.entries
  end

  def order_update
  end

  def order_delete
  end

  def order_params
    params.require(:order_submissions).permit(
      :agentFirstName, :agentLastName, :agentEmail, :agentPhone,
      :otherEmail, :address1Prop, :address2Prop, :city,
      :state, :zipcode, :sqft)
  end

end