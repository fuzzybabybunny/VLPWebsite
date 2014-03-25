class SiteController < ActionController::Base
  # Prevent CSRF attacks by raising an exception.
  # For APIs, you may want to use :null_session instead.

  def index
  end

  def images
  end

  def videos
  end

  def single_property_websites
  end

  def technique
  end

  def prices
  end

  def testimonials
  end

  def about
  end

  def contact
  end

  def privacy
  end

  def terms
  end

  def register
  end

  def backend
    redirect_to backend_url
  end

end