  <section class="repair-types ">
      <livewire:components.top-bar />
      <livewire:components.mega-nav theme="white" />
      <div class="bg-color">

          <div class="container">
              <div class="text-center py-5 w-75 mx-auto">
                  <h2 class="text-danger">Our Terms & Conditions</h2>
              </div>
              <div class="card border-0 about-fone-card my-3 p-3">
                  {{-- <h3>Our terms and conditons</h3> --}}
                  {{-- <hr> --}}
                  <div class="lh-lg" style="text-align: justify">
                      <h2><u>Sell Your Device to Us</u></h2>
                      At {{ $siteSettings->buisness_name ?? '' }}, we provide a seamless process for selling
                      your devices. Before proceeding, please carefully review the terms
                      and conditions outlined below to ensure a smooth transaction.<br />
                      <ul class="p-0 m-0">
                          <h3>1. Device Evaluation Process</h3>
                          <ol class="d">
                              <li>
                                  <b>Device Selection:</b> When selling a device to us
                                  through our website, you'll be prompted to select the
                                  device you wish to sell. The price offered for the
                                  device will be displayed based on the information
                                  provided.
                              </li>
                              <li>
                                  <b>Condition Verification:</b> Upon receiving the
                                  device, our team will conduct a thorough inspection to
                                  verify its condition. This evaluation includes checking
                                  for physical damages, functionality, and compliance with
                                  the selected device details.
                              </li>
                              <li>
                                  <b>Verification Process:</b> The device will undergo a
                                  comprehensive verification process to ensure it matches
                                  the specifications and conditions indicated during the
                                  selling process.
                              </li>
                          </ol>
                      </ul>
                      <h3>2. Payment and Verification</h3>

                      <ol class="d">
                          <li>
                              <b>Payment Confirmation:</b>If the device matches the
                              description provided by the seller and passes our
                              verification process, payment will be initiated as per the
                              agreed-upon price.
                          </li>
                          <li>
                              <b>Payment Methods:</b> We offer various payment methods for
                              your convenience. The agreed-upon amount can be transferred
                              via preferred payment modes specified during the selling
                              process.
                          </li>

                          <li>
                              <b>Discrepancies or Issues:</b> In cases where the device
                              condition doesn't align with the seller's description or if
                              there are discrepancies found during verification, we'll
                              promptly contact the seller to discuss options. This may
                              involve adjusting the offered price or returning the device.
                          </li>
                      </ol>
                      <h3>3. Data and Security</h3>
                      <ol class="d">
                          <li>
                              <b>Data Erasure:</b>Prior to selling your device, it's
                              strongly advised to back up and erase all personal data.
                              While we take stringent measures to protect user data,
                              ensuring the removal of personal information is the seller's
                              responsibility.
                          </li>
                          <li>
                              <b>Data Privacy:</b> We adhere to strict data privacy
                              guidelines. Any data obtained during the verification
                              process is handled securely and in compliance with privacy
                              regulations.
                          </li>
                      </ol>

                      <h3>4. Warranty and After-Sale Support</h3>
                      <ol class="d">
                          <li>
                              <b>Post-sale Warranty:</b>For devices sold to us, there is
                              no warranty or support provided after the sale. The sale is
                              considered final upon successful verification and payment.
                          </li>
                          <li>
                              <b>Customer Support:</b> We offer assistance and support
                              during the selling process. Feel free to contact our
                              customer support for any queries or concerns related to
                              selling your device.
                          </li>

                          <p>
                              By initiating the process to sell your device to {{ $siteSettings->buisness_name ?? '' }}, you agree to comply with these terms and
                              conditions. Please ensure accurate device information and
                              conditions are provided to facilitate a smooth transaction.
                          </p>
                      </ol>


                      <h2><u>Buy Devices from Us</u></h2>
                      At {{ $siteSettings->buisness_name ?? '' }}, we aim to provide a streamlined process for purchasing devices from our
                      inventory. Prior to initiating a purchase, please review the comprehensive terms and conditions
                      below to ensure a smooth transaction.<br />
                      <ul class="p-0 m-0">
                          <h3>1. Device Selection and Purchase</h3>
                          <ol class="d">
                              <li>
                                  <b>Device Selection:</b> Customers can browse our inventory displayed on our website.
                                  Each device is listed with detailed specifications and condition information.
                              </li>
                              <li>
                                  <b>Reservation and Payment:</b> To purchase a device, customers can either reserve it
                                  for in-store pickup or make an online payment for delivery. Reserving a device ensures
                                  availability for in-store collection, while online payment initiates the delivery
                                  process.
                              </li>
                              <li>
                                  <b> Checkout Process:</b> The checkout process involves selecting the desired device,
                                  specifying the preferred payment and delivery method, and providing accurate contact
                                  and shipping information.
                              </li>
                          </ol>
                      </ul>
                      <h3>2. Device Delivery and Condition</h3>

                      <ol class="d">
                          <li>
                              <b>Delivery Options:</b> Customers opting for delivery will receive the purchased device
                              at the provided shipping address within the specified timeframe. In-store pickup options
                              require customers to collect the reserved device from our physical store.
                          </li>
                          <li>
                              <b>Condition Verification:</b> Upon delivery or collection, customers are advised to
                              inspect the device thoroughly. If there are discrepancies between the delivered device's
                              condition and the listed specifications, customers are encouraged to contact us promptly
                              for resolution.
                          </li>


                      </ol>
                      <h3>3. Payment and Warranty</h3>
                      <ol class="d">
                          <li>
                              <b>Payment Methods: </b> We offer secure payment methods for online purchases. Customers
                              can choose from various payment options available during the checkout process.
                          </li>
                          <li>
                              <b>Warranty Coverage:</b> Devices purchased from our store come with a limited warranty.
                              The warranty covers specified issues related to the device. Any post-sale issues should be
                              reported within the warranty period for resolution.
                          </li>
                      </ol>

                      <h3>4. Returns and Customer Support</h3>
                      <ol class="d">
                          <li>
                              <b>Return Policy:</b> In cases where the delivered device does not meet the listed
                              specifications or has undisclosed issues, customers can request a return. Our return
                              policy specifies the conditions and timeframe for eligible returns.
                          </li>
                          <li>
                              <b>Customer Support:</b> We provide comprehensive customer support to address inquiries,
                              assist with after-sale concerns, and guide customers through the buying process.
                          </li>

                          <p>
                              By purchasing devices from {{ $siteSettings->buisness_name ?? '' }}, customers agree to adhere to these terms
                              and conditions. It is recommended to review the listed device specifications and
                              conditions thoroughly before finalizing the purchase.
                          </p>
                      </ol>

                      <h2><u>Device Repair Services</u></h2>
                      At {{ $siteSettings->buisness_name ?? '' }}, we prioritize efficient and reliable repair services for a variety of
                      devices. Prior to availing of our repair services, please review the terms and conditions below
                      for a comprehensive understanding of our process.<br />
                      <ul class="p-0 m-0">
                          <h3>1. Repair Options</h3>
                          <ol class="d">
                              <li>
                                  <b>Visit our Store:</b> Customers can browse our inventory displayed on our website.
                                  Each device is listed with detailed specifications and condition information.
                              </li>
                              <li>
                                  <b>Mail-in Repairs:</b> For convenience, customers can opt for mail-in repairs.
                                  Details regarding the repair process, cost estimation, and shipping instructions are
                                  available on our website.
                              </li>
                              <li>
                                  <b> Pickup Services:</b> We offer device pickup services from the customer's specified
                                  address. Customers can schedule a pickup through our website and make necessary online
                                  payments.
                              </li>
                              <li>
                                  <b> On-site Repairs:</b> Our technicians can conduct repairs at the customer's
                                  location. This service requires prior appointment scheduling and online payment on our
                                  website.
                              </li>
                          </ol>
                      </ul>
                      <h3>2. Repair Process</h3>

                      <ol class="d">
                          <li>
                              <b>Evaluation and Estimate:</b> Upon receiving the device, our technicians will conduct a
                              comprehensive evaluation to determine the repair requirements. Customers will receive an
                              estimated cost, repair time, and a detailed breakdown of repair services.
                          </li>
                          <li>
                              <b>Repair Execution:</b> Repair services are executed promptly using high-quality parts
                              and advanced techniques. We aim to complete repairs within the specified repair time, as
                              indicated for each device or model on our booking page.
                          </li>
                          <li>
                              <b>Quality Assurance:</b> Repaired devices undergo stringent quality checks to ensure they
                              meet our standards before being returned to the customer.
                          </li>


                      </ol>
                      <h3>3. Payment, Warranty, and Repair Time</h3>
                      <ol class="d">
                          <li>
                              <b>Payment Methods: </b> Payment for repair services can be made online through our
                              website. The cost includes service charges and the cost of any replaced parts, if
                              applicable.
                          </li>
                          <li>
                              <b>Repair Warranty:</b> We offer a limited warranty for the repairs conducted. The
                              warranty covers the specific repair conducted and related components. The details of the
                              warranty coverage are provided at the time of repair and are subject to terms and
                              conditions.
                          </li>
                          <li>
                              <b>Device-Specific Repair Time:</b> For transparency, repair times for each device or
                              model are clearly indicated on our booking page. This information helps customers
                              understand the estimated duration required for the repair of their specific device.
                          </li>
                      </ol>

                      <h3>4. Data and Device Security</h3>
                      <ol class="d">
                          <li>
                              <b>Data Protection:</b> Customers are advised to back up their device data before availing
                              repair services. While we take precautions to safeguard user data, we are not liable for
                              any data loss during the repair process.
                          </li>
                          <li>
                              <b> Device Security:</b> We prioritize device security during repairs. Customers can trust
                              us to handle their devices with utmost care and security measures in place.
                          </li>

                          <p>
                              By availing our repair services, customers agree to adhere to these terms and conditions.
                              It is recommended to provide accurate device information and description of issues for a
                              more accurate evaluation and repair.
                          </p>
                      </ol>
                      <h3>5. GDPR Consent and Cookie Acceptance</h3>
                      <ol class="d">
                          <li>
                              <b>GDPR Consent:</b> By agreeing to these terms and conditions, customers consent to the
                              collection and processing of their data in compliance with GDPR regulations. We handle
                              customer data responsibly and in accordance with legal requirements.

                          </li>
                          <li>
                              <b> Acceptance of Cookies:</b> By using our website, customers agree to the use of cookies
                              in accordance with our Privacy Policy. Cookies enhance user experience and are used for
                              site functionality and analytics.

                          </li>

                          <p>
                              By engaging with our services and accepting these terms and conditions, you acknowledge
                              consent to GDPR regulations and agree to the use of cookies. We strive to provide
                              transparent, reliable, and satisfactory services to meet your device needs.
                          </p>
                      </ol>

                  </div>
              </div>


          </div>
      </div>
      <style>
          a:link {
              color: rgb(0, 0, 0);
              background-color: transparent;
              text-decoration: none;
          }

          a:hover {
              color: red;
              background-color: transparent;
              text-decoration: underline;
          }

          ol.d {
              list-style-type: lower-alpha;
          }
      </style>
  </section>