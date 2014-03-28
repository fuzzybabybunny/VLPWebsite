require 'spec_helper'

  describe User do

    # it "is valid with an email" do
    #   user = User.new(
    #       email: "sdafsdaf"
    #     )
    #   expect(user).to be_valid
    # end

    User.create(
        email: "me@me.com",
        password: "123"
      )

    it "is a valid email" do
      user = User.new(
          email: "sadfa@sdafkj.com"
        )
      expect(user.email).to match /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/
    end

    it "is an invalid email" do
      user = User.new(
          email: "ca$hmoney@f*ck.bitchz"
        )
      expect(user.email).not_to match /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/
    end

    # it "has matching password and password_confirmation" do
    #   user = User.new(
    #       password: "abc",
    #       password_confirmation: "abc"
    #     )
    #   expect(user.password).to eql(user.password_confirmation)
    # end

    # it "does not have matching password and password_confirmation" do
    #   user = User.new(
    #     password: "njk",
    #     password_confirmation: "abc"
    #   )
    #   expect(user.password).not_to eql(user.password_confirmation)
    # end

    # it "can save user with correct email and matching passwords" do
    #   user = User.new(
    #     email: "email@email.com",
    #     password: "abc",
    #     password_confirmation: "abc"
    #   )
    #   result = user.save
    #   expect(result).to be_true
    # end

    it "can authenticate user correctly" do
      user = User.find_by email: "me@me.com"
      wasAuthenticated = user.authenticate "123"
      expect(wasAuthenticated).to be_true
    end


    # it "is invalid without an email" do
    #   user = User.new(
    #       email: ""
    #     )
    #   expect(user).to be_invalid
    # end

    # it "is invalid without an salt" do
    #   user = User.new(
    #       salt: ""
    #     )
    #   expect(user).to be_invalid
    # end

    # it "is invalid without an fish" do
    #   user = User.new(
    #       fish: ""
    #     )
    #   expect(user).to be_invalid
    # end

    # it "is valid with a string email" do
    #   user = User.new(
    #       email: "sdafsdaf"
    #     )
    #   expect(user).to be_valid
    # end


  end