@extends('layouts.template')

@section('content')
<main>
    <header class="page header color-1 overlay alpha-8 image-background cover gradient gradient-43" style="background-image: url('img/bg/waves.jpg')">
        <div class="divider-shape">
            <!-- waves divider -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" class="shape-waves" style="left: 0; transform: rotate3d(0,1,0,180deg);">
                <path class="shape-fill shape-fill-6" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z" />
            </svg>
        </div>
        <div class="container" style="">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="regular display-4 color-1 mb-4">Pricing </h1>
                    <p class="lead color-1">Here are the answers to some of the most common questions we hear from our appreciated customers.</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid py-3 demo-blocks">
        <section class="pricing block bg-contrast">
           <div class="container py-4">
              <div class="section-heading text-center">
                 <h2>Not ready to buy?</h2>
              </div>
              <div class="border">
                 <div class="row py-5">
                    <div class="col-sm-5 mx-auto">
                       <h4>You can give DashCore a try !!!</h4>
                       <ul class="list mt-4">
                          <li><i class="font-regular icon lnr-magic-wand"></i>Lorem ipsum dolor sit amet</li>
                          <li><i class="font-regular icon lnr-database"></i>Adipisci blanditiis consequuntur debitis</li>
                          <li><i class="font-regular icon lnr-heart"></i>Alias aliquam eaque nisi non</li>
                          <li><i class="font-regular icon lnr-layers"></i>Doloribus, inventore, quo! Amet culpa debitis</li>
                          <li><i class="font-regular icon lnr-history"></i>Minus modi nisi repellat reprehenderit!</li>
                       </ul>
                    </div>
                    <div class="col-sm-5 mx-auto text-center">
                       <h4>Start using DashCore for free</h4>
                       <p class="pricing-value"><span class="price font-xl">0</span></p>
                       <!-- <a class="btn btn-lg btn-success">Get started NOW</a> --> <a href="#" class="btn btn-rounded btn-primary py-3 px-5">Get started NOW</a>
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <section class="section block bg-contrast">
            <div class="container bring-to-front border-top py-4 py-4">
              <div class="section-heading text-center">
                 <div class="btn-group btn-group-toggle mt-5 pricing-table-basis" data-toggle="buttons"><label class="btn btn-primary"><input type="radio" name="pricing-basis" value="monthly" checked="checked"> Monthly</label> <label class="btn btn-primary active"><input type="radio" name="pricing-basis" value="yearly"> Yearly</label></div>
                 <p class="text-muted">Pay annually and get 2 months free</p>
              </div>
              <div class="pricing-table pricing-table-table">
                 <div class="d-md-none">
                    <div class="btn-group btn-group-toggle pricing-table-tabs mb-3" data-toggle="buttons"><label class="btn btn-primary"><input type="radio" name="pricing-plan" value="1"> Free</label> <label class="btn btn-primary active" checked="checked"><input type="radio" name="pricing-plan" value="2"> Starter</label> <label class="btn btn-primary"><input type="radio" name="pricing-plan" value="3"> Power</label></div>
                 </div>
                 <div class="table-wrapper">
                    <table class="table yearly-display">
                       <thead class="expand-mobile">
                          <tr>
                             <th class="title text-left"><span class="hidden bold">Choose Your Plan</span></th>
                             <th id="ph-1" class="">
                                <p class="h4 pricing-title bold my-0">Free</p>
                                <p class="my-0">For individuals</p>
                             </th>
                             <th id="ph-2" class="visible-cell overflow-hidden position-relative">
                                <p class="h4 pricing-title bold my-0">Starter</p>
                                <p class="my-0">For small business</p>
                             </th>
                             <th id="ph-3" class="">
                                <p class="h4 pricing-title bold my-0">Power</p>
                                <p class="my-0">For large companies</p>
                             </th>
                          </tr>
                       </thead>
                       <tbody class="pricing-details">
                          <tr>
                             <th><span>Monthly price</span></th>
                             <td headers="ph-1" class="">
                                <div class="pricing">
                                   <span class="pricing-value">
                                      <span class="price text-dark odometer odometer-auto-theme" data-monthly="0" data-yearly="0">
                                         <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div>
                                      </span>
                                   </span>
                                </div>
                             </td>
                             <td headers="ph-2" class="visible-cell">
                                <div class="pricing">
                                   <span class="pricing-value">
                                      <span class="price text-dark odometer odometer-auto-theme" data-monthly="24" data-yearly="19">
                                         <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">9</span></span></span></span></span></div>
                                      </span>
                                   </span>
                                </div>
                             </td>
                             <td headers="ph-3" class="">
                                <div class="pricing">
                                   <span class="pricing-value">
                                      <span class="price text-dark odometer odometer-auto-theme" data-monthly="99" data-yearly="79">
                                         <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">7</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">9</span></span></span></span></span></div>
                                      </span>
                                   </span>
                                </div>
                             </td>
                          </tr>
                       </tbody>
                       <tbody class="pricing-details">
                          <tr>
                             <th id="pc-1">Always-on recording</th>
                             <td headers="ph-1 pc-1" class=""><i class="fas fa-times"></i></td>
                             <td headers="ph-2 pc-1" class="visible-cell"><i class="fas fa-check text-success"></i></td>
                             <td headers="ph-3 pc-1" class=""><i class="fas fa-check text-success"></i></td>
                          </tr>
                          <tr>
                             <th id="pc-2">Events</th>
                             <td headers="ph-1 pc-2" class="">2</td>
                             <td headers="ph-2 pc-2" class="visible-cell">2</td>
                             <td headers="ph-3 pc-2" class="">Unlimited</td>
                          </tr>
                          <tr>
                             <th id="pc-3">Funnels</th>
                             <td headers="ph-1 pc-3" class="">1</td>
                             <td headers="ph-2 pc-3" class="visible-cell">1</td>
                             <td headers="ph-3 pc-3" class="">Unlimited</td>
                          </tr>
                          <tr>
                             <th id="pc-4">Heatmaps</th>
                             <td headers="ph-1 pc-4" class="">3</td>
                             <td headers="ph-2 pc-4" class="visible-cell">Unlimited</td>
                             <td headers="ph-3 pc-4" class="">Unlimited</td>
                          </tr>
                          <tr>
                             <th id="pc-5">Sessions/month</th>
                             <td headers="ph-1 pc-5" class="">1,500</td>
                             <td headers="ph-2 pc-5" class="visible-cell">
                                <select name="sessions_starter" id="sessions_starter" class="form-control" data-toggle="price">
                                   <option value="5000">5000</option>
                                   <option value="25000">25,000</option>
                                   <option value="50000">50,000</option>
                                </select>
                             </td>
                             <td headers="ph-3 pc-5" class="">
                                <select name="sessions_power" id="sessions_power" class="form-control" data-toggle="price">
                                   <option value="25000">25,000</option>
                                   <option value="50000">50,000</option>
                                   <option value="100000">100,000</option>
                                </select>
                             </td>
                          </tr>
                          <tr>
                             <th id="pc-6">Data history</th>
                             <td headers="ph-1 pc-6" class="">1 month</td>
                             <td headers="ph-2 pc-6" class="visible-cell">
                                <select name="data_starter" id="data_starter" class="form-control" data-toggle="price">
                                   <option value="1">1 month</option>
                                   <option value="3">3 months</option>
                                </select>
                             </td>
                             <td headers="ph-3 pc-6" class="">
                                <select name="data_power" id="data_power" class="form-control" data-toggle="price">
                                   <option value="1">1 month</option>
                                   <option value="3">3 months</option>
                                   <option value="6">6 months</option>
                                   <option value="12">12 months</option>
                                </select>
                             </td>
                          </tr>
                       </tbody>
                       <tbody class="expand-mobile">
                          <tr>
                             <td class="text-left">Prices don't include tax.</td>
                             <td headers="ph-1 " class=""><a href="javascript:;" class="btn btn-rounded btn-success">Get Free Plan</a></td>
                             <td headers="ph-2 " class="visible-cell"><a href="javascript:;" class="btn btn-rounded btn-success">Get Starter Plan</a></td>
                             <td headers="ph-3 " class=""><a href="javascript:;" class="btn btn-rounded btn-success">Get Power Plan</a></td>
                          </tr>
                       </tbody>
                       <tfoot>
                          <tr>
                             <td colspan="4">
                                <p class="pricing-disclaimer"><span class="bold">15-day money-back guarantee.</span> If you're not 100% satisfied, we'll give you your money back.</p>
                             </td>
                          </tr>
                       </tfoot>
                    </table>
                 </div>
              </div>
            </div>
        </section>
    </div>
</main>
@endsection
