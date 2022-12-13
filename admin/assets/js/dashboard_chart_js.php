<script>
//2nd chart bar chart /*start
$(function () {
    // Pie chart
    // ------------------------------

    // Generate chart
    var pie_chart = c3.generate({
        bindto: '#c3-pie-chart-ride',
        size: { width: 350 },
        color: {
            // pattern: ['#99C0DB','#FB998E','#19bdb5','#007dc6','#263238','#ec407a']
            pattern: ['#99C0DB','#19bdb5','#007dc6']
        },
        data: {
            columns: [
                ['On Going', <?php echo CountTotalFromTable("pns_ride_offers_details"," id > 0 AND status <='3' "); ?>],
                ['Completed', <?php echo CountTotalFromTable("pns_ride_offers_details"," id > 0 AND status ='4' "); ?>],
                ['Cancelled', <?php echo CountTotalFromTable("pns_ride_offers_details"," id > 0 AND status >'4'"); ?>],
                
            ],
            type : 'pie'
        }
    });
    
});
//console.log()
//first chart bar chart /*start
$(function () {
    //BEGIN BAR CHART
    var d3 = [
        ["Jan", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(1) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Feb", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(2) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Mar", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(3) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Apr", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(4) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["May", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(5) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Jun", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(6) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Jul", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(7) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Aug", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(8) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Sep", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(9) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Oct", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(10) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Nov", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(11) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Dec", <?php echo CountTotalFromTable("pns_ride_offers_details"," MONTH(date)=(12) AND YEAR(date) = YEAR(CURRENT_DATE()) AND status ='4' ");?>]
    ];
    $.plot("#bar-chart-ride", [
        {
            data: d3,
            label: "Completed Rides",
            color: "#01b6ad"
        }
    ], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x :"+" <?php echo " Completed Rides ";?>"+" %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END BAR CHART
	

});

/*End*/


//2nd chart bar chart /*start
$(function () {
    // Pie chart
    // ------------------------------

    // Generate chart
    var pie_chart = c3.generate({
        bindto: '#c3-pie-chart-vehicle',
        size: { width: 350 },
        color: {
            // pattern: ['#99C0DB','#FB998E','#19bdb5','#007dc6','#263238','#ec407a']
            pattern: ['#ec407a','#19bdb5']
        },
        data: {
            columns: [
                ['Offline', <?php echo CountTotalFromTable("pns_vehicle_details"," id > 0 AND status !='1' "); ?>],
                ['Online', <?php echo CountTotalFromTable("pns_vehicle_details"," id > 0 AND status ='0' "); ?>],
                
                
            ],
            type : 'pie'
        }
    });
    
});
//console.log()
//first chart bar chart /*start
$(function () {
    //BEGIN BAR CHART
    var d3 = [
        ["Jan", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(1) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Feb", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(2) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Mar", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(3) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Apr", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(4) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["May", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(5) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Jun", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(6) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Jul", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(7) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Aug", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(8) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Sep", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(9) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Oct", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(10) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Nov", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(11) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>],
        ["Dec", <?php echo CountTotalFromTable("pns_vehicle_details"," MONTH(date_added)=(12) AND YEAR(date_added) = YEAR(CURRENT_DATE()) ");?>]
    ];
    $.plot("#bar-chart-vehicle", [
        {
            data: d3,
            label: "Total Vehicles",
            color: "#01b6ad"
        }
    ], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x :"+" <?php echo " Vehicles ";?>"+" %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END BAR CHART
	

});

/*End*/



//2nd chart bar chart /*start
$(function () {
    // Pie chart
    // ------------------------------

    // Generate chart
    var pie_chart = c3.generate({
        bindto: '#c3-pie-chart-driver',
        size: { width: 350 },
        color: {
            // pattern: ['#99C0DB','#FB998E','#19bdb5','#007dc6','#263238','#ec407a']
            pattern: ['#99C0DB','#FB998E','#ec407a','#19bdb5','#007dc6']
        },
        data: {
            columns: [
                ['Only Registered', <?php echo CountTotalFromTable("pns_driver"," id > 0 AND status = '0' "); ?>],
                ['Pending Documents', <?php echo CountTotalFromTable("pns_driver"," id > 0 AND status ='1' "); ?>],
                ['Document Unverified', <?php $ulist_pen=GetDocumentVerifcationPendingUsers(); 
                if($ulist_pen!="")
                {
                    $cur_cond=" id > 0 AND (status = '2' OR cid IN ($ulist_pen)) ";
                }else
                {
                    $cur_cond=" id > 0 AND (status = '2') ";
                }
                echo CountTotalFromTable("pns_driver",$cur_cond); ?>],
                ['Pending Vehicle', <?php echo CountTotalFromTable("pns_driver"," id > 0 AND status ='3' "); ?>],
                ['Active Driver', <?php echo CountTotalFromTable("pns_driver"," id > 0 AND status ='4' "); ?>],
                
                
            ],
            type : 'pie'
        }
    });
    
});
//console.log()
//first chart bar chart /*start
$(function () {
    //BEGIN BAR CHART
    var d3 = [
        ["Jan", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(1) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Feb", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(2) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Mar", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(3) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Apr", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(4) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["May", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(5) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Jun", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(6) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Jul", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(7) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Aug", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(8) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Sep", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(9) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Oct", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(10) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Nov", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(11) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>],
        ["Dec", <?php echo CountTotalFromTable("pns_driver"," MONTH(date_added)=(12) AND YEAR(date_added) = YEAR(CURRENT_DATE()) AND status ='4' ");?>]
    ];
    $.plot("#bar-chart-driver", [
        {
            data: d3,
            label: "Total Drivers",
            color: "#01b6ad"
        }
    ], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x :"+" <?php echo " Drivers ";?>"+" %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END BAR CHART
	

});

/*End*/
</script>

