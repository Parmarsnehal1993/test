<div class="card-body">
    <table class="table mb-0 td-plr-0">
        {{-- <tr>
            <td>
                Debts:
            </td>
            <td class="text-right">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="yes" name="Debts" class="custom-control-input">
                    <label class="custom-control-label" for="yes">yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="no" name="Debts" class="custom-control-input">
                    <label class="custom-control-label" for="no">no</label>
                </div>
            </td>
        </tr> --}}
    </table>
</div>

<div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#user_pdf_modal">
    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
</div>

<div id="user_pdf_modal" class="modal fade Checklist" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" style="padding-right: 16px;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
           <div class="overflow-y-auto">
                <div class="modal-header">
                    <div class="card-title">User PDF</div>
                    <button type="button" class="close alert_open">
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                    </button>
                </div>
               
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <table class="table search-table">
                                    <thead>
                                        <tr>
                                            <th>Name </th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
           
                                    <tbody id="dynamic_checklist_data">
                                        @if(!empty($allPdfData))
                                            @foreach($allPdfData as $allPdfDataey => $allPdfDataValue)
                                                @if(!empty($allPdfDataValue['pdf1']) && !empty($allPdfDataValue['pdf2']))
                                                    <tr>
                                                        <td>
                                                            {{ str_replace('uploads/', '', $allPdfDataValue['pdf1']) }}
                                                        </td>
                                                        <td>
                                                            <a href="https://freezecms.co.uk/FREEZE/{{ $allPdfDataValue['pdf1'] }}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            {{ str_replace('uploads/', '', $allPdfDataValue['pdf2']) }}
                                                        </td>
                                                        <td>
                                                            <a href="https://freezecms.co.uk/FREEZE/{{ $allPdfDataValue['pdf2'] }}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                        </td>
                                                    </tr>
                                                    @else
                                                        @if(!empty($allPdfDataValue['pdf1']))
                                                            <tr>
                                                                <td>
                                                                    {{ str_replace('uploads/', '', $allPdfDataValue['pdf1']) }}
                                                                </td>
                                                                <td>
                                                                    <a href="https://freezecms.co.uk/FREEZE/{{ $allPdfDataValue['pdf1'] }}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        @if(!empty($allPdfDataValue['pdf2']))
                                                            <tr>
                                                                <td>
                                                                    {{ str_replace('uploads/', '', $allPdfDataValue['pdf2']) }}
                                                                </td>
                                                                <td>
                                                                    <a href="https://freezecms.co.uk/FREEZE/{{ $allPdfDataValue['pdf2']}}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>