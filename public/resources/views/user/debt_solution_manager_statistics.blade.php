
            <div id="app">
                <main class="py-4 text-capitalize" style="padding-top: 0px !important;">
                    <main class="main-content manager-dashboard">
                        <!-- header -->
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                <div class="row mt--100">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  p-0">
                                        <div class="main-title">
                                            <h1 class="font-h1">
													 @php $loginUserData = Auth::user();
														unset($loginUserData->password);
														$loginUser = $loginUserData;
														
														@endphp
														
                                                        <strong>{{ $loginUser->name }}'s Workflow</strong>
												        
                                                
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / header -->
                        <section class="card-section">
                            <!-- case view -->
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row ml--30 mr-0">
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card section-height-auto height-auto">
                                                        <div class="card-title text-center">
                                                            Iva Draft
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax  d-block"
                                                                data-type="iva draft">
                                                                <h1 class="text-center height-auto line-height-auto">
                                                                    {{ (isset($allCasesCount['ivadraftCount']) && !empty($allCasesCount['ivadraftCount'])) ? $allCasesCount['ivadraftCount'] : 0 }}
                                                                </h1>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card section-height-auto height-auto">
                                                        <div class="card-title text-center">
                                                            Sent to Ip 
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="SENT TO IP">
                                                                <h1 class="text-center height-auto line-height-auto">
                                                                    {{ (isset($allCasesCount['totalSentToIp']) && !empty($allCasesCount['totalSentToIp'])) ? $allCasesCount['totalSentToIp'] : 0 }}
                                                                </h1>
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card section-height-auto height-auto">
                                                        <div class="card-title text-center">
                                                            Pass back IVA
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax  d-block"
                                                                data-type="Pass Back IVA">
                                                                 <h1 class="text-center">
                                                                    {{ (isset($allCasesCount['totalPassBackIva']) && !empty($allCasesCount['totalPassBackIva'])) ? $allCasesCount['totalPassBackIva'] : 0 }}
                                                                 </h1>
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card section-height-auto height-auto">
                                                        <div class="card-title text-center">
                                                            No Answer IVA
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="No Answer IVA">
                                                                <h1 class="text-center">
                                                                    {{ (isset($allCasesCount['totalNoAnswerIva']) && !empty($allCasesCount['totalNoAnswerIva'])) ? $allCasesCount['totalNoAnswerIva'] : 0 }}        
                                                                </h1>
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div
                                                        class="card section-height-auto height-auto"
                                                        style="min-height: 208px !important;">
                                                        <div class="card-title text-center">
                                                            IVA Quality AVG
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
																	
                                                                        <h1>{{ (isset($allCasesCount['totalAverage_iva']) && !empty($allCasesCount['totalAverage_iva'])) ? $allCasesCount['totalAverage_iva'] : 0 }}  %      
                                                                        </h1>
                                                                    
                                                                    <p class="text-primary">
                                                                        Total
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                                    <div
                                                        class="card section-height-auto height-auto"
                                                        style="min-height: 208px !important;">
                                                        <div class="card-title text-center">
                                                            DMP Quality AVG
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                                    
                                                                            <h1>{{ (isset($allCasesCount['totalAverage_dmp']) && !empty($allCasesCount['totalAverage_dmp'])) ? $allCasesCount['totalAverage_dmp'] : 0 }} %</h1>
                                                                    
                                                                    <p class="text-primary">
                                                                        Total
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  ml--30 mr-0">
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card section-height-auto height-auto">
                                                        <div class="card-title text-center">
                                                            Dmp draft
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax  d-block"
                                                                data-type="dmp draft">
                                                                <h1 class="text-center height-auto line-height-auto">
                                                                    {{ (isset($allCasesCount['totaldmpcount']) && !empty($allCasesCount['totaldmpcount'])) ? $allCasesCount['totaldmpcount'] : 0 }}        
                                                           	    </h1>
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card section-height-auto height-auto">
                                                        <div class="card-title text-center">
                                                            SEND TO DMP PROVIDER
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="SEND TO DMP PROVIDER">
                                                                <h1 class="text-center height-auto line-height-auto">
                                                                    {{ (isset($allCasesCount['totalSendToDmpProviderCount']) && !empty($allCasesCount['totalSendToDmpProviderCount'])) ? $allCasesCount['totalSendToDmpProviderCount'] : 0 }}
                                                                </h1>
                                                            </a>
                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card section-height-auto height-auto">
                                                        <div class="card-title text-center">
                                                            PASS  BACK DMP
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="Pass Back DMP">
                                                                 <h1 class="text-center height-auto line-height-auto">
                                                                    {{ (isset($allCasesCount['totalPassBackDmp']) && !empty($allCasesCount['totalPassBackDmp'])) ? $allCasesCount['totalPassBackDmp'] : 0 }}
                                                            </h1>
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card section-height-auto height-auto">
                                                        <div class="card-title text-center">
                                                            NO ANSWER DMP
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="No Answer DMP">
                                                                <h1 class="text-center height-auto line-height-auto">
                                                                    {{ (isset($allCasesCount['totalNoAnswerDmp']) && !empty($allCasesCount['totalNoAnswerDmp'])) ? $allCasesCount['totalNoAnswerDmp'] : 0 }}
                                                              </h1>
                                                            </a>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div
                                                        class="card section-height-auto height-auto card-radius"
                                                        style="min-height: 460px !important;">
                                                        <div class="card-title">
                                                            DMP & IVA performance
                                                        </div>
                                                        <div class="card-body" style="margin-top:60px;">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                                    <p class="text-muted">Sent to IP</p>
                                                                    
                                                                        <h1>{{ (isset($allCasesCount['totalSentToIp']) && !empty($allCasesCount['totalSentToIp'])) ? $allCasesCount['totalSentToIp'] : 0 }}
                                                                        </h1>
                                                                    
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                                    <p class="text-muted">Sub IVA</p>
                                                                    
                                                                        <h1>{{ (isset($allCasesCount['getSubmittedIva']) && !empty($allCasesCount['getSubmittedIva'])) ? $allCasesCount['getSubmittedIva'] : 0 }}
                                                                        </h1>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                                    <p class="text-muted">Conversion</p>
                                                                    
                                                                        @if(!empty($allCasesCount['totalSentToIp']) && !empty($allCasesCount['getSubmittedIva']))
                                                                        <h1>{{ round($allCasesCount['getSubmittedIva'] / $allCasesCount['totalSentToIp']) }}%</h1>
                                                                        @else 
                                                                        <h1>0%</h1>
                                                                        @endif
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                                    <p class="text-muted">Sent to DMP</p>
                                                                   
                                                                        <h1>{{ (isset($allCasesCount['totaldmpcount']) && !empty($allCasesCount['totaldmpcount'])) ? $allCasesCount['totaldmpcount'] : 0 }}
                                                                        </h1>
                                                                    
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                                    <p class="text-muted">Sub DMP</p>
                                                                    
                                                                        <h1>{{ (isset($allCasesCount['getSubmittedDmp']) && !empty($allCasesCount['getSubmittedDmp'])) ? $allCasesCount['getSubmittedDmp'] : 0 }}
                                                                        </h1>
                                                                   
                                                                </div>
                                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                                                                    <p class="text-muted">Conversion</p>
                                                                   
                                                                        @if(!empty($allCasesCount['totaldmpcount']) && !empty($allCasesCount['getSubmittedDmp']))
                                                                        <h1>{{ round($allCasesCount['getSubmittedDmp'] / $allCasesCount['totaldmpcount'])  }}%</h1>
                                                                        @else 
                                                                        <h1>0%</h1>
                                                                        @endif
                                                                       
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ case view -->
                            <!-- proceess -->
                            <div class="row" style="margin-top:-250px;">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row ml--30 mr-0" style="margin-top:10px">
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
                                            <div
                                                class="card section-height-auto height-auto"
                                                style="min-height: 234px !important;">
                                                <div class="card-title">
                                                    Paid on MOC
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="paid on MOC">
                                                                <h1>{{ (isset($allCasesCount['totalPaidOnMoc']) && !empty($allCasesCount['totalPaidOnMoc'])) ? $allCasesCount['totalPaidOnMoc'] : 0 }}</h1>
                                                            </a>
                                                            <p class="text-primary">
                                                                Total
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
                                            <div
                                                class="card section-height-auto height-auto"
                                                style="min-height: 234px !important;">
                                                <div class="card-title">
                                                    Failed IVA Compliance
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                            @php 
                                                            $data = ComplianceCount('Failed_iva_compliance');
                                                           
                                                            @endphp
                                                            <a
                                                                href="javascript:void(0)"
                                                                class="statistics columnAjax d-block"
                                                                data-type="Failed IVA Compliance">
                                                                    <h1>{{ $data ? $data : 0 }}</h1>
                                                            </a>
                                                            <p class="text-primary">
                                                                Total
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
                                            <div
                                                class="card section-height-auto height-auto"
                                                style="min-height: 234px !important;">
                                                <div class="card-title">
                                                    Failed DMP Compliance
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @php 
                                                            $data = ComplianceCount('Failed_dmp_compliance');
                                                            
                                                            @endphp
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                             <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Failed DMP Compliance">
                                                                <h1>{{ $data ? $data : 0 }}</h1>    
                                                            </a>
                                                            <p class="text-primary">
                                                                Total
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 text-center">
                                            <div
                                                class="card section-height-auto height-auto"
                                                style="min-height: 234px !important;">
                                                <div class="card-title">
                                                    
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                             <a href="javascript:void(0)" class="statistics columnAjax d-block" data-type="Awaiting Docs">
                                                            <h1></h1>	</a>
                                                            <p class="text-primary">
                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- // proceess -->
                        </section>
                    </main>
                </main>
            </div>
        </div>

        
    </body>
</html>