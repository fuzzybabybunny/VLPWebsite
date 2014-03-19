require 'bcrypt'
PASSWORD_RESET_EXPIRES = 4

class PasswordResetConfirmation

  def initialize(flash)
    @flash = flash
  end

  def send_reset_confirmation(user)
    user.set_password_reset
    UserNotifier.reset_password(user).deliver
    @flash.now[:notice] = "We are sending you an email for you to reset your password."
  end

  private

  def user_params
    params.require(:user).permit(:email, :password)
  end

end