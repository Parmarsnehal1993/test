<html>

<head>

  <!--<link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">-->
  <style>
    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */

    /* Document
   ========================================================================== */

    /**
 * 1. Correct the line height in all browsers.
 * 2. Prevent adjustments of font size after orientation changes in iOS.
 */

    html {
      line-height: 1.15;
      /* 1 */
      -webkit-text-size-adjust: 100%;
      /* 2 */
    }

    /* Sections
     ========================================================================== */

    /**
   * Remove the margin in all browsers.
   */

    body {
      margin: 0;
    }

    /**
   * Render the `main` element consistently in IE.
   */

    main {
      display: block;
    }

    /**
   * Correct the font size and margin on `h1` elements within `section` and
   * `article` contexts in Chrome, Firefox, and Safari.
   */

    h1 {
      font-size: 2em;
      margin: 0.67em 0;
    }

    /* Grouping content
     ========================================================================== */

    /**
   * 1. Add the correct box sizing in Firefox.
   * 2. Show the overflow in Edge and IE.
   */

    hr {
      box-sizing: content-box;
      /* 1 */
      height: 0;
      /* 1 */
      overflow: visible;
      /* 2 */
    }

    /**
   * 1. Correct the inheritance and scaling of font size in all browsers.
   * 2. Correct the odd `em` font sizing in all browsers.
   */

    pre {
      font-family: monospace, monospace;
      /* 1 */
      font-size: 1em;
      /* 2 */
    }

    /* Text-level semantics
     ========================================================================== */

    /**
   * Remove the gray background on active links in IE 10.
   */

    a {
      background-color: transparent;
    }

    /**
   * 1. Remove the bottom border in Chrome 57-
   * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
   */

    abbr[title] {
      border-bottom: none;
      /* 1 */
      text-decoration: underline;
      /* 2 */
      text-decoration: underline dotted;
      /* 2 */
    }

    /**
   * Add the correct font weight in Chrome, Edge, and Safari.
   */

    b,
    strong {
      font-weight: bolder;
    }

    /**
   * 1. Correct the inheritance and scaling of font size in all browsers.
   * 2. Correct the odd `em` font sizing in all browsers.
   */

    code,
    kbd,
    samp {
      font-family: monospace, monospace;
      /* 1 */
      font-size: 1em;
      /* 2 */
    }

    /**
   * Add the correct font size in all browsers.
   */

    small {
      font-size: 80%;
    }

    /**
   * Prevent `sub` and `sup` elements from affecting the line height in
   * all browsers.
   */

    sub,
    sup {
      font-size: 75%;
      line-height: 0;
      position: relative;
      vertical-align: baseline;
    }

    sub {
      bottom: -0.25em;
    }

    sup {
      top: -0.5em;
    }

    /* Embedded content
     ========================================================================== */

    /**
   * Remove the border on images inside links in IE 10.
   */

    img {
      border-style: none;
    }

    /* Forms
     ========================================================================== */

    /**
   * 1. Change the font styles in all browsers.
   * 2. Remove the margin in Firefox and Safari.
   */

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      /* 1 */
      font-size: 100%;
      /* 1 */
      line-height: 1.15;
      /* 1 */
      margin: 0;
      /* 2 */
    }

    /**
   * Show the overflow in IE.
   * 1. Show the overflow in Edge.
   */

    button,
    input {
      /* 1 */
      overflow: visible;
    }

    /**
   * Remove the inheritance of text transform in Edge, Firefox, and IE.
   * 1. Remove the inheritance of text transform in Firefox.
   */

    button,
    select {
      /* 1 */
      text-transform: none;
    }

    /**
   * Correct the inability to style clickable types in iOS and Safari.
   */

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
      -webkit-appearance: button;
    }

    /**
   * Remove the inner border and padding in Firefox.
   */

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
      border-style: none;
      padding: 0;
    }

    /**
   * Restore the focus styles unset by the previous rule.
   */

    button:-moz-focusring,
    [type="button"]:-moz-focusring,
    [type="reset"]:-moz-focusring,
    [type="submit"]:-moz-focusring {
      outline: 1px dotted ButtonText;
    }

    /**
   * Correct the padding in Firefox.
   */

    fieldset {
      padding: 0.35em 0.75em 0.625em;
    }

    /**
   * 1. Correct the text wrapping in Edge and IE.
   * 2. Correct the color inheritance from `fieldset` elements in IE.
   * 3. Remove the padding so developers are not caught out when they zero out
   *    `fieldset` elements in all browsers.
   */

    legend {
      box-sizing: border-box;
      /* 1 */
      color: inherit;
      /* 2 */
      display: table;
      /* 1 */
      max-width: 100%;
      /* 1 */
      padding: 0;
      /* 3 */
      white-space: normal;
      /* 1 */
    }

    /**
   * Add the correct vertical alignment in Chrome, Firefox, and Opera.
   */

    progress {
      vertical-align: baseline;
    }

    /**
   * Remove the default vertical scrollbar in IE 10+.
   */

    textarea {
      overflow: auto;
    }

    /**
   * 1. Add the correct box sizing in IE 10.
   * 2. Remove the padding in IE 10.
   */

    [type="checkbox"],
    [type="radio"] {
      box-sizing: border-box;
      /* 1 */
      padding: 0;
      /* 2 */
    }

    /**
   * Correct the cursor style of increment and decrement buttons in Chrome.
   */

    [type="number"]::-webkit-inner-spin-button,
    [type="number"]::-webkit-outer-spin-button {
      height: auto;
    }

    /**
   * 1. Correct the odd appearance in Chrome and Safari.
   * 2. Correct the outline style in Safari.
   */

    [type="search"] {
      -webkit-appearance: textfield;
      /* 1 */
      outline-offset: -2px;
      /* 2 */
    }

    /**
   * Remove the inner padding in Chrome and Safari on macOS.
   */

    [type="search"]::-webkit-search-decoration {
      -webkit-appearance: none;
    }

    /**
   * 1. Correct the inability to style clickable types in iOS and Safari.
   * 2. Change font properties to `inherit` in Safari.
   */

    ::-webkit-file-upload-button {
      -webkit-appearance: button;
      /* 1 */
      font: inherit;
      /* 2 */
    }

    /* Interactive
     ========================================================================== */

    /*
   * Add the correct display in Edge, IE 10+, and Firefox.
   */

    details {
      display: block;
    }

    /*
   * Add the correct display in all browsers.
   */

    summary {
      display: list-item;
    }

    /* Misc
     ========================================================================== */

    /**
   * Add the correct display in IE 10+.
   */

    template {
      display: none;
    }

    /**
   * Add the correct display in IE 10.
   */

    [hidden] {
      display: none;
    }





    @font-face {
      font-family: CircularStd;
      src: url(fonts/CircularStd-Black.otf);
    }

    body {
      font-family: 'CircularStd', sans-serif;
      font-size: 16px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th {
      border-bottom: 1px solid rgb(156, 156, 156);
      padding-bottom: 10px !important;
      white-space: nowrap;
      font-size: 18px;
    }

    table th,
    table td {
      padding: 5px;
      vertical-align: top;
    }

    .table-2 th,
    .table-2 td,
    .table-1 th,
    .table-1 td {
      text-align: left;
      border-bottom: 1px solid rgb(156, 156, 156);
    }

    .main {
      max-width: 920px;
      margin: auto;
    }

    .table-1 th {
      border: none;
      vertical-align: middle;
    }

    .mb-0 {
      margin-bottom: 20px;
    }

    h1 {
      color: #000;
    }

    a {
      background-color: transparent;
      color: #999;
      text-decoration: none;
    }

    th {
      color: #999;
    }

    img {
      display: block;
      margin-left: auto;
    }

    .table-3 {
      margin-top: 100px;
    }

    .table-2 {
      margin-top: 50px;
    }

    table span {
      font-family: 'Fira Code', monospace;
    }

    .table-2:not(.table-3) td {
      border: none;
    }

    .table-3 td:nth-child(1) {
      width: 90px;
    }

    .table-3 td:nth-child(2) {
      /*width: 350px;*/
      width: 239px;
    }

    .table-3 td:last-child,
    .table-3 th:last-child {
      text-align: left;
    }

    table {
      color: #333;
    }

    .main {
      margin-top: 50px;
    }

    @media print {
      thead {
        display: table-header-group;
        page-break-after: always;
      }
    }

    .header {
      position: fixed;
      top: 0;
      bottom: 0;
      margin-top: 40px !important;
      margin-bottom: 70px !important;
    }

    .table-1 {
      page-break-before: always
    }

    @page {
      margin: 30px 0px;
    }


    .b-none {
      border: none !important;
    }
    .main{
      page-break-after: auto;
    }
    .footer{
      max-width: 920px;
      margin: auto;
    }
    @page :last {
       background-color: red;
}
  </style>
</head>

<body>

  <!-- <header class="header">
    <img src="https://freezecms.co.uk/public/images/Light%20blue_Freeze%20logo@2x.png " alt="Logo" width="50"
      style="float:right;margin-left:20px!important;margin-bottom:20px;">
  </header> -->

  <main class="main">
    <table class="table-1">
      <thead>
        <tr>
          <th>
          <h3 class="mb-0" style="color: black;font-size:25px;">{{ $bank_name }} {{ $account_type }} Account</h3>
          </th>
          <th></th>
          <th></th>
          <th></th>
          <th>
            <img src="{!! asset('images/Light blue_Freeze logo@2x.png') !!}" alt="Freeze" width="150">
          </th>
        </tr>
        
      </thead>
	    @php 
            $debitAmount = 0;
            $debitAmountTotal = 0;
            $creditAmount = 0;
            $creditAmountTotal = 0;
            $lastClosingBalance = 0;
        @endphp
		 
			  <tr>
				<th>Account Number</th>
				<th>Sort Code</th>
				<th>Statement Date</th>
				<th>Holder Name</th>
			  </tr>
			  <tr>
				        <td>{{ $account_id }}</td> 
                <td>{{ $sort_code }}</td>
                <td>{{ $statement_date }}</td>   
                <td>{{ $full_name }}</td> 
			  </tr>
			  <tr>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
			  </tr>
			  <tr>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
			  </tr>
			  <tr>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
			  </tr>
			  <tr>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
			  </tr>
			  <tr>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
			  </tr>
			  <tr>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
				<td class="b-none"></td>
			  </tr>
			  <tr>
				<th>Date</th>
				<th>Description</th>
				<th>Debit</th>
				<th>Credit</th>
				<th>Balance</th>
			  </tr>
      </tbody>
		 @foreach($accountTranscationResponse as $innerTranscationKey => $innerTranscationValue)
                      @if ($innerTranscationValue->transaction_type == "DEBIT")
                        @php 
                          $debitAmount = $innerTranscationValue->amount;
                          if(isset($debitAmount) && !empty($debitAmount)){
                            $debitAmount = "£".$debitAmount;
                          }
                          $debitAmountTotal += $innerTranscationValue->amount;
                          $creditAmount = "";
                        @endphp
                      @elseif ($innerTranscationValue->transaction_type == "CREDIT")
                        @php 
                          $creditAmount = $innerTranscationValue->amount;
                          if(isset($creditAmount) && !empty($creditAmount)){
                            $creditAmount = "£".$creditAmount;
                          } 
                          $creditAmountTotal += $innerTranscationValue->amount;
                          $debitAmount = "";
                        @endphp
                      @endif
                        <tr>
                            <td>{{ substr($innerTranscationValue->timestamp,0,10) }}</td>
                            <td>{{ $innerTranscationValue->description }}</td>
                            <td>{{ $debitAmount }}</td>
                            <td>{{ $creditAmount }}</td>
                            <td>{{ $innerTranscationValue->running_balance->amount  }}</td>
                            @php
                              $lastClosingBalance = $innerTranscationValue->running_balance->amount;
                            @endphp
                        </tr>
                    @endforeach
      <tr>
        <td></td>
        <td>Total Debits</td>
        <td>{{ $debitAmountTotal }}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td>Total Credit</td>
        <td></td>
        <td>{{ $creditAmountTotal }}</td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td>Closing Balance</td>
        <td></td>
        <td></td>
        <td>{{ $lastClosingBalance }}</td>
      </tr>
    </table>
    <table class="table-2">

    </table>
    <table class="table-2 table-3">
      <tbody>

    </table>
  </main>
  <div class="footer">
    <h5 class="text-center" style="color:rgb(156, 156, 156);">The information displayed in this statement has been
      provided by Barclays Personal Open Banking APIs and supplied by Credit Kudos.
      Credit Kudos Limited are authorised and regulated by the Financial Conduct Authority (reference number: 795791)
      as an Account Information
      Services Provider (AISP) under the Second Payment Services Directive (PSD2).</h5>
  </div>
</body>

</html>