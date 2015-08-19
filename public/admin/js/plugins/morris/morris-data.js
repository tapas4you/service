//Define Base Path
//var base_path = "http://localhost/roi/public/admin/";
//var base_path = "http://192.168.1.86/roi/public/admin/";
$(document).ready(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            iphone: 2666,
            ipad: null,
            itouch: 2647
        }, {
            period: '2010 Q2',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
        }, {
            period: '2010 Q3',
            iphone: 4912,
            ipad: 1969,
            itouch: 2501
        }, {
            period: '2010 Q4',
            iphone: 3767,
            ipad: 3597,
            itouch: 5689
        }, {
            period: '2011 Q1',
            iphone: 6810,
            ipad: 1914,
            itouch: 2293
        }, {
            period: '2011 Q2',
            iphone: 5670,
            ipad: 4293,
            itouch: 1881
        }, {
            period: '2011 Q3',
            iphone: 4820,
            ipad: 3795,
            itouch: 1588
        }, {
            period: '2011 Q4',
            iphone: 15073,
            ipad: 5967,
            itouch: 5175
        }, {
            period: '2012 Q1',
            iphone: 10687,
            ipad: 4460,
            itouch: 2028
        }, {
            period: '2012 Q2',
            iphone: 8432,
            ipad: 5713,
            itouch: 1791
        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['Miami', 'New York City', 'California City'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
});

// Vendor Sales Chart
$(function() {
    var filterType=$('#filterReport').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var params='filter_type=' + filterType;
    var url=base_path+"dashboard/getVendorSalesReport";
      $.ajax({
        type    :"POST",
        url     :url,
        dataType:"json",
        data    :params,
        success :function(response) {
                 Morris.Donut({
                 element: 'morris-donut-chart',
                    data:response, 
                    resize: true
                });
            }
        });
   
});

//Dealer Comparison 
$(function() {

    var filterType=$('#filterReport').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var params='filter_type=' + filterType;
    var url=base_path+"dashboard/getDealerComparisonReport";
      $.ajax({
        type    :"POST",
        url     :url,
        dataType:"json",
        data    :params,
        success :function(response) {
            var lbl=[
                        'TV Commercial',
                        'Google'
                    ];
                Morris.Bar({
                    element: 'morris-bar-chart',
                    //data:response['data'], 
                    data:response,
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Jaguar', 'BMW'],
                    //labels:response['labels'],
                    hideHover: 'auto',
                    resize: true
                });
            }
        });
});
