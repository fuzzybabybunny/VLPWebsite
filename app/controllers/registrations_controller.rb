class RegistrationsController < ApplicationController

BLANK_FIELDS = "You have left one of the registration fields blank. Please fill in all fields and re-submit."
ALREADY_REGISTERED = "This e-mail address is already registered. You can reset your password from the home page if you have forgotten it."
NON_MATCHING_PASSWORDS = "Your passwords do not match. Please try again."
WELCOME = "User has been registered."

  def new_user
  end

  def registration
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
      return if log_user_in( @user, WELCOME )

    end
    # (redirect_to new_user and return) unless registration occurs?
    if current_user
      redirect_to root_url
    else
      render :new_user
    end

  end

  private

  def user_params
    params.require(:user).permit(:email, :password, :password_confirmation, :role)
  end

end