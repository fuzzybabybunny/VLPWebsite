#This is from Mongo, so it is going to perform differently from other class. For example, we're not initializing anything in it

class OrderSubmission

  include Mongoid::Document
  include Mongoid::Timestamps

  field :agentFirstName, type: String
  field :agentLastName, type: String
  field :agentEmail, type: String
  field :agentPhone, type: String
  field :otherEmail, type: String
  field :address1Prop, type: String
  field :address2Prop, type: String
  field :city, type: String
  field :state, type: String
  field :zipcode, type: String
  field :sqft, type: String
  field :hdrPhotos, type: String
  field :panoramas, type: String
  field :spw, type: String
  field :url, type: String
  field :urlDesired, type: String
  field :videoFull, type: String
  field :twilightPhotos, type: String
  field :twilightVideo, type: String
  field :rush, type: String
  field :tourfactory, type: String

  scope :search, lambda {|query|
    where(["name LIKE ?", "%#{query}%"])
  }

  def self.create_order(
    agentFirstName, agentLastName, agentEmail,
    agentPhone, otherEmail, address1Prop,
    address2Prop, city,
    zipcode, sqft)
    db.order_submissions.insert( {
      agentFirstName: blank,
      agentLastName: blank,
      agentEmail: blank,
      agentPhone: blank,
      otherEmail: blank,
      address1Prop: blank,
      address2Prop: blank,
      city: blank,
      zipcode: blank,
      sqft: blank
      } )
      self.save
  end

end