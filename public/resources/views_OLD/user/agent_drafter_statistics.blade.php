<section class="statistics-section">
    <div class="row">
        <div class="col-sm-4">
            <div class="statistics">
                <h2>{{ getNewAgentDrafterLeads($dashboardLoginUser->id) }}</h2>
                <p>New Leads</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="statistics">
                <h2>{{ getTotalAgentDrafterLeads($dashboardLoginUser->id) }}</h2>
                <p>Total Leads</p>
            </div>
        </div>
    </div>
</section>

<section class="statistics-section statistics-tabs-bordered text-uppercase text-center">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row d-flex justify-content-center">
                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 width-20">
                    <p>Debt Draft</p>
                    <a href="javascript:void(0)" class="statistics columnAjax" data-type="send_to_drafter">
                        <h2>{{ isset($totalAgentDrafter) ? $totalAgentDrafter : 0 }}</h2>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 width-20">
                    <p>sent to ip</p>
                    <a href="javascript:void(0)" class="statistics columnAjax" data-type="Sent to IP">
                        <h2>{{ array_change_key_case($columnCount)['sent to ip'] ?? $countableColumns['sent to ip'] }}</h2>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 width-20">
                    <p>APPOINTMENTS</p>
                    <a href="{{ route('agent.appointment_list') }}" class="statistics">
                        <h2>{{ getTotalAgentDrafterAppointment($dashboardLoginUser->id) }}</h2>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 width-20">
                    <p>reminder due</p>
                    <a href="{{ route('agent.callback_list') }}" class="statistics">
                        <h2>{{ getTotalAgentDrafterCallback($dashboardLoginUser->id) }}</h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-t-b-100">
            <div class="row d-flex justify-content-center">
                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 width-20">
                    <p>completed</p>
                    <a href="javascript:void(0)" class="statistics columnAjax" data-type="completed">
                        <!--<h2>{{ array_change_key_case($columnCount)['completed'] ?? $countableColumns['completed'] }}</h2>-->
                        <h2>{{ getTotalAgentDrafterCompletedCasesMonthly($dashboardLoginUser->id) }}</h2>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 width-20">
                    <p>canceled</p>
                    <a href="javascript:void(0)" class="statistics columnAjax" data-type="cancelled">
                        <h2>{{ array_change_key_case($columnCount)['cancelled'] ?? $countableColumns['cancelled'] }}</h2>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 width-20">
                    <p>Paid on MOC</p>
                    <a href="javascript:void(0)" class="statistics columnAjax" data-type="Paid on MOC">
                        <h2>{{ array_change_key_case($columnCount)['paid on moc'] ?? $countableColumns['Paid on MOC'] }}</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>