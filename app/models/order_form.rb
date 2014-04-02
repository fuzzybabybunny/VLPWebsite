EMAIL_REGEX = /\A[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}\Z/i

class OrderForm

  validates :agentEmail,  :presence => true,
                          :format => EMAIL_REGEX,

end