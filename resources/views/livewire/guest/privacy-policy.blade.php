  <section class="repair-types ">
      <livewire:components.top-bar />
      <livewire:components.mega-nav theme="white" />
      <div class="bg-color">
          <div class="container">
              <div class="text-center py-5 w-75 mx-auto">
                  <h2 class="text-danger">Privacy Policy</h2>
              </div>
              <div class="card border-0 about-fone-card my-3 p-3">
                  {{-- <h3>Our privacy policy</h3> --}}
                  {{-- <hr> --}}
                  <p class="lh-lg" style="text-align: justify; ">
                      Your privacy is important to us. It is {{ $siteSettings->buisness_name ?? '' }}'s policy
                      to respect your privacy regarding any information we may collect
                      from you through our website,<a href="{{ $siteSettings->website_url ?? '' }}" target="_blank">{{ $siteSettings->website_url ?? '' }}</a>.
                      We only ask for
                      personal information when we truly need it to
                      provide a service to you. We collect it by fair and lawful means,
                      with your knowledge and consent. We also let you know why we're
                      collecting it and how it will be used. We don't share any personally
                      identifying information publicly or with third-parties, except when
                      required by law. Website Visitors Like most website operators, {{ $siteSettings->buisness_name ?? '' }} collects non-personally-identifying information of
                      the sort that web browsers and servers typically make available,
                      such as the browser type, language preference, referring site, and
                      the date and time of each visitor request. Our purpose in collecting
                      non-personally identifying information is to better understand how
                      our visitors use our website. Gathering of Personally-Identifying
                      Information Certain visitors to {{ $siteSettings->buisness_name ?? '' }} websites
                      choose to interact with us in ways that require us to gather
                      personally-identifying information. The amount and type of
                      information that we gather depend on the nature of the interaction.
                      For example, we ask visitors who book repair services through our
                      website to provide their name, email address, phone number, and
                      device details. Security The security of your Personal Information
                      is important to us, but remember that no method of transmission over
                      the Internet or method of electronic storage is 100% secure. While
                      we strive to use commercially acceptable means to protect your
                      Personal Information, we cannot guarantee its absolute security.
                      Links to External Sites Our Service may contain links to external
                      sites that are not operated by us. If you click on a third-party
                      link, you will be directed to that third party's site. We strongly
                      advise you to review the Privacy Policy and terms of service of
                      every site you visit. Aggregated Statistics We may collect
                      statistics about the behavior of visitors to our website. {{ $siteSettings->buisness_name ?? '' }} may display this information publicly or provide it to
                      others. However, we do not disclose your personally-identifying
                      information. Cookies To enrich and perfect your online experience,
                      {{ $siteSettings->buisness_name ?? '' }} uses "Cookies", similar technologies, and
                      services provided by others to display personalized content,
                      appropriate advertising, and store your preferences on your
                      computer. You have the option to either accept or refuse these
                      cookies and know when a cookie is being sent to your computer. If
                      you choose to refuse our cookies, you may not be able to use some
                      portions of our Service. Privacy Policy Changes Although most
                      changes are likely to be minor, {{ $siteSettings->buisness_name ?? '' }} may change its
                      Privacy Policy from time to time, and at our sole discretion. We
                      encourage visitors to frequently check this page for any changes.
                      Your continued use of this site after any change in this Privacy
                      Policy will constitute your acceptance of such change. Contact
                      Information If you have any questions about this Privacy Policy,
                      please contact us at
                      <a target="_blank" href="#">
                          {{ $siteBranch->email ?? '' }}</a>.
                  </p>
              </div>


          </div>
      </div>
      <style>
    .lh-lg {
        padding: 0 222px;
    }

    @media only screen and (max-width: 767px) {
        /* Set padding to zero for screens smaller than 768 pixels (phones) */
        .lh-lg {
            padding: 0;
        }
    }

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
</style>

  </section>