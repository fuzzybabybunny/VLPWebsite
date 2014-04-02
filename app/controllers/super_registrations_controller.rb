class SuperRegistrationsController < ApplicationController

BLANK_FIELDS = "You have left one of the registration fields blank. Please fill in all fields and re-submit."
ALREADY_REGISTERED = "This e-mail address is already registered. You can reset your password from the home page if you have forgotten it."
NON_MATCHING_PASSWORDS = "Your passwords do not match. Please try again."
HAS_BEEN_REGISTERED = "User has been registered."

  def new_user
  end

  def super_registration
    if (params[:user][:email].blank? or params[:user][:password].blank? or params[:user][:password_confirmation].blank?)
      flash.now[:alert] = BLANK_FIELDS
    elsif params[:user][:email] == User.find_by( params[:email] )
      flash.now[:alert] = ALREADY_REGISTERED
    elsif (params[:user][:password] != params[:user][:password_confirmation])
      flash.now[:alert] = NON_MATCHING_PASSWORDS
    else
      #register new user
      @user = User.new(user_params)
      @user.save
      flash_notice_user_created(HAS_BEEN_REGISTERED)
    end
    # (redirect_to new_user and return) unless registration occurs?
  end

  private

  def user_params
    params.require(:user).permit(:email, :password, :password_confirmation, :role)
  end

end