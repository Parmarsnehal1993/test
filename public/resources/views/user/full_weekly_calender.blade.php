@extends('layouts.app')
@section('content')
<main class="main-content  pt-0">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <div class="row mt--70 mb-3">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                    <div class="main-title">
                        <h1 class="font-h1">
                            <strong>Good Morning Lucy
                                Workflow</strong>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header -->
    <section class="card-section">
       <div class="row">
           <div class="col-md-12 pl-0">
               <div class="weekly-calendar list-unstyled">
                   <div class="card card-secondary">
                        <div class="card-title">
                            today
                        </div>
                        <ul class="list-unstyled">
                            <li data-toggle="modal" data-target="#quick_view" data-keyboard="false" data-backdrop="static">
                                <div class="slot-time">
                                    12:30 - 01:00
                                </div>
                                <div class="slot-name">
                                    Miss Kelly Smith
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    03:30 - 04:00
                                </div>
                                <div class="slot-name">
                                    Mr david mann
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    05:00 - 04:00
                                </div>
                                <div class="slot-name">
                                    Miss laura street
                                </div>
                            </li>
                        </ul>
                   </div>

                   <div class="card card-secondary">
                        <div class="card-title">
                            21/02/2020
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="slot-time">
                                    08:30 - 09:00
                                </div>
                                <div class="slot-name">
                                    Miss Holly silver
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    10:30 - 11:00
                                </div>
                                <div class="slot-name">
                                    mr don draper
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    12:00 - 12:30
                                </div>
                                <div class="slot-name">
                                    miss samantha stop  
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    04:00 - 04:30
                                </div>
                                <div class="slot-name">
                                    miss lona street  
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    04:00 - 04:30
                                </div>
                                <div class="slot-name">
                                    miss hope lone   
                                </div>
                            </li>
                        </ul>
                   </div>

                   <div class="card card-secondary">
                        <div class="card-title">
                            22/02/2020
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="slot-time">
                                    09:30 - 10:00
                                </div>
                                <div class="slot-name">
                                    mr ken benson
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    05:30 - 06:00
                                </div>
                                <div class="slot-name">
                                    mr david luck
                                </div>
                            </li>
                        </ul>
                   </div>

                   <div class="card card-secondary">
                        <div class="card-title">
                            23/02/2020
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="slot-time">
                                    12:30 - 01:00
                                </div>
                                <div class="slot-name">
                                    Miss lucy ann
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    03:30 - 04:00
                                </div>
                                <div class="slot-name">
                                    mr bob harry
                                </div>
                            </li>
                            <li>
                                <div class="slot-time">
                                    03:30 - 04:00
                                </div>
                                <div class="slot-name">
                                    mr bob harry
                                </div>
                            </li>
                        </ul>
                   </div>

                   <div class="card card-secondary">
                        <div class="card-title">
                            24/02/2020
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="slot-time">
                                    08:30 - 09:00
                                </div>
                                <div class="slot-name">
                                    mr chetan makwana
                                </div>
                            </li>
                        </ul>
                   </div>
               </div>
           </div>
       </div>
    </section>
    <div id="quick_view" class="modal fade Checklist Quick-view" tabindex="-1" role="dialog" aria-labelledby="quick_view" >

        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content card card-secondary">

            <div class="overflow-y-auto">
                    <div class="modal-header">
                
                        <div class="card-title">
                
                            Quick view - David Mann

                        </div>
                        
                    </div>
                
                    <div class="modal-body">
                
                        <div class="row">
                
                            <div class="col-md-6" style="padding-right: 4.33%;">
                                <table class="table search-table text-center">
                                    <tr>
                                        <th>Ammount Owned</th>
                                        <th>Lender</th>
                                        <th>Monthly Payment</th>
                                    </tr>
                                    <tr>
                                        <td>&#163;2400</td>
                                        <td>Santander</td>
                                        <td>&#163;424</td>
                                    </tr>
                                    <tr>
                                        <td>&#163;500</td>
                                        <td>Aqua</td>
                                        <td>&#163;43</td>
                                    </tr>
                                    <tr>
                                        <td>&#163;340</td>
                                        <td>Very</td>
                                        <td>&#163;99</td>
                                    </tr>
                                    <tr>
                                        <td>&#163;90</td>
                                        <td>Llyds</td>
                                        <td>&#163;90</td>
                                    </tr>
                                    <tr>
                                        <td>&#163;23,000</td>
                                        <td>santander</td>
                                        <td>&#163;540</td>
                                    </tr>
                                </table>
                            </div>
                
                            <div class="col-md-6" style="border-left:1.5px solid #008dcc;padding-left: 9%;">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4>income:</h4>
                                            <h1>&#163;2,100</h1>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4>expenditure:</h4>
                                            <h1>&#163;1,714</h1>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4>assets:</h4>
                                            <h1>&#163;23,400</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-140 mt-3" style="padding-left:15%;">
                                    <table class="table mb-0 td-plr-0">
                                        <tbody>
                                            <tr>
                                    
                                                <td>
                                    
                                                    Debts:
                                    
                                                </td>
                                    
                                                <td class="text-right">
                                    
                                                    <div class="custom-control custom-radio custom-control-inline">
                                    
                                                        <input type="radio" id="slot_yes" name="Debts" class="custom-control-input">
                                    
                                                        <label class="custom-control-label" for="slot_yes">yes</label>
                                    
                                                    </div>
                                    
                                                    <div class="custom-control custom-radio custom-control-inline">
                                    
                                                        <input type="radio" id="slot_no" name="Debts" class="custom-control-input">
                                    
                                                        <label class="custom-control-label" for="slot_no">no</label>
                                    
                                                    </div>
                                    
                                                </td>
                                    
                                            </tr>
                                    
                                            <tr>
                                    
                                                <td>
                                    
                                                    Wage Slip:
                                    
                                                </td>
                                    
                                                <td class="text-right">
                                    
                                                    <div class="custom-control custom-radio custom-control-inline">
                                    
                                                        <input
                                                            type="radio"
                                                            id="slot_wage_yes"
                                                            name="Wage_slip"
                                                            value="YES"
                                                            checked=""
                                                            class="custom-control-input">
                                    
                                                        <label class="custom-control-label" for="slot_wage_yes">yes</label>
                                    
                                                    </div>
                                    
                                                    <div class="custom-control custom-radio custom-control-inline">
                                    
                                                        <input
                                                            type="radio"
                                                            id="slot_wage_yes_no"
                                                            name="Wage_slip"
                                                            value="No"
                                                            class="custom-control-input">
                                    
                                                        <label class="custom-control-label" for="slot_wage_yes_no">no</label>
                                    
                                                    </div>
                                    
                                                </td>
                                    
                                            </tr>
                                    
                                            <tr>
                                    
                                                <td>
                                    
                                                    Bank Statement:
                                    
                                                </td>
                                    
                                                <td class="text-right">
                                    
                                                    <div class="custom-control custom-radio custom-control-inline">
                                    
                                                        <input
                                                            type="radio"
                                                            id="slote_bank_statement_yes"
                                                            name="bank_statement"
                                                            value="PIC"
                                                            checked=""
                                                            class="custom-control-input">
                                    
                                                        <label class="custom-control-label" for="slote_bank_statement_yes">yes</label>
                                    
                                                    </div>
                                    
                                                    <div class="custom-control custom-radio custom-control-inline">
                                    
                                                        <input
                                                            type="radio"
                                                            id="slot_bank_statement_no"
                                                            name="bank_statement"
                                                            value="EMAIL"
                                                            class="custom-control-input">
                                    
                                                        <label class="custom-control-label" for="slot_bank_statement_no">No</label>
                                    
                                                    </div>
                                    
                                                </td>
                                    
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                
                    </div>

                    <div class="modal-footer mb-0">
                        <a href="javascript:void(0)" class="btn btn-outline-info btn-large" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#slot_book">View Case</a>
                        <a href="javascript:void(0)" class="btn btn-outline-info btn-large" data-dismiss="modal">Close</a>
                    </div>
                
            </div>
            </div>

        </div>

    </div>
    <div id="slot_book" class="modal fade slot_book"  tabindex="-1" role="dialog" aria-labelledby="slot_book">
        <div class="modal-dialog modal-sm">
            <div class="modal-content card card-secondary">
                <div class="modal-header">
                    <div class="card-title text-center width-100">
                        DMP Advisor Availability
                    </div>
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
               
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
               
                        </button>
                </div>
                <div class="modal-body">
                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-header text-center br-right">
                            AM Availability
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-header">
                            27/01/2020
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-header">
                            27/01/2020
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-header">
                            27/01/2020
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-header">
                            27/01/2020
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-header">
                            27/01/2020
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-header">
                            27/01/2020
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-header">
                            27/01/2020
                        </div>
                    </div>
                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                            08:00 - 08:30
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available" data-toggle="dropdown">
                            <div>3 available</div>    
                            <i class="fa fa-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <div class="dropdown-item">qasim</div>
                                <div class="dropdown-item">dave</div>
                                <div class="dropdown-item">lucy</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>3 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>3 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>3 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>3 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                            08:30 - 09:00
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                            <div>1 available</div>    
                            <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div> 
                                <i class="fa fa-chevron-down"></i>   
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                            09:00 - 09:30
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>6 available</div>  
                                <i class="fa fa-chevron-down"></i>  
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                        <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                        <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                    </div>
                    
                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                            09:30 - 10:00
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                            <div>1 available</div>    
                            <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                    </div>

                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                            10:00 - 10:30
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>6 available</div> 
                                <i class="fa fa-chevron-down"></i>   
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>6 available</div> 
                                <i class="fa fa-chevron-down"></i>   
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>6 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                        <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>6 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                    </div>

                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                            10:30 - 11:00
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>1 available</div>   
                            <i class="fa fa-chevron-down"></i>

                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>   
                                <i class="fa fa-chevron-down"></i>

                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                    </div>
                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                            11:00 - 11:30
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>  
                                <i class="fa fa-chevron-down"></i>  
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn unavailable">
                                <div>unavailable</div>    
                            </button>
                        </div>
                    </div>
                    <div class="slot-book-table d-grid">
                        <div class="d-flex align-items-center align-content-center slot-body text-center br-right">
                            11:30 - 12:00
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                            <div>2 available</div>    
                            <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>    
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center align-content-center slot-body">
                            <button class="btn btn-outline-primary bg-white slot-btn available">
                                <div>2 available</div>    
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection