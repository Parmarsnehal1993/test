
 <style>
    table, th, td {
        border: 1px solid black;
        border-spacing: 0px;
    }

</style>
<div class="row">

<div class="col-md-12">

    <div class="card">
        <div class="card-body">
    
            <div class="table-responsive grid-wrapper">

                

                <div id="get_all_agent_data" style="display: block;">
    
                    <table class="table search-table text-center border-0" id="#">
                        <thead>
                            <tr>
                                <th>Agent Name</th>
                                <th>Send IVA</th>
                                <th>Send DMP</th>
                                <th>Awaiting Docs</th>
                                <th>ADNC DAY1</th>
                                <th>ADNC DAY2</th>
                                <th>ADNC DAY3</th>
                                <th>ADNC DAY4</th>
                                <th>In Process</th>
                                <th>IPNC Day1</th>
                                <th>IPNC Day2</th>
                                <th>IPNC Day3</th>
                                <th>IPNC Day4</th>
                                <th>Messageday1</th>
                                <th>Messageday2</th>
                                <th>Messageday3</th>
                                <th>Messageday4</th>
                                <th>Not Intrested</th>
                                <th>DNC</th>
                                <th>DRO</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                
                        @foreach($finalAllAgent as $innerKey => $innerValue) 
                                <tbody>
                                     @php
                                    $total = 0;
                                    $total = $innerValue['sendIva'] + $innerValue['sendDmp'] + $innerValue['sendAwaitingDocs'] + $innerValue['sendawaitingdocsday1'] + $innerValue['sendawaitingdocsday2'] + $innerValue['sendawaitingdocsday3'] + $innerValue['sendawaitingdocsday4'] + $innerValue['sendInProcess'] + $innerValue['sendinprocessday1'] + $innerValue['sendinprocessday2'] + $innerValue['sendinprocessday3'] + $innerValue['sendinprocessday4'] + $innerValue['sendMessageday1'] + $innerValue['sendMessageday2'] + $innerValue['sendMessageday3'] + $innerValue['sendMessageday4'] + $innerValue['sendNotIntrested'] + $innerValue['sendDnc'] + $innerValue['sendDro'];
                                    @endphp
                                    <td>{{ $innerKey }}</td>
                                    <td>{{ $innerValue['sendIva'] }}</td>
                                    <td>{{ $innerValue['sendDmp'] }}</td>
                                    <td>{{ $innerValue['sendAwaitingDocs'] }}</td>
                                    <td>{{ $innerValue['sendawaitingdocsday1'] }}</td>
                                    <td>{{ $innerValue['sendawaitingdocsday2'] }}</td>
                                    <td>{{ $innerValue['sendawaitingdocsday3'] }}</td>
                                    <td>{{ $innerValue['sendawaitingdocsday4'] }}</td>
                                    <td>{{ $innerValue['sendInProcess'] }}</td>
                                    <td>{{ $innerValue['sendinprocessday1'] }}</td>
                                    <td>{{ $innerValue['sendinprocessday2'] }}</td>
                                    <td>{{ $innerValue['sendinprocessday3'] }}</td>
                                    <td>{{ $innerValue['sendinprocessday4'] }}</td>
                                    <td>{{ $innerValue['sendMessageday1'] }}</td>
                                    <td>{{ $innerValue['sendMessageday2'] }}</td>
                                    <td>{{ $innerValue['sendMessageday3'] }}</td>
                                    <td>{{ $innerValue['sendMessageday4'] }}</td>
                                    <td>{{ $innerValue['sendNotIntrested'] }}</td>
                                    <td>{{ $innerValue['sendDnc'] }}</td>
                                    <td>{{ $innerValue['sendDro'] }}</td>
                                    <td>{{ $total }}</td>
                                </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div> 