<?php
/**
 * TDateRangePicker Date Piker
 * Copyright (c) 2006-2010 Pablo Dall'Oglio
 * @author  Pablo Dall'Oglio <pablo [at] adianti.com.br>
 * @version 2.0, 2007-08-01
 */
class TDateRangePicker extends TEntry implements AdiantiWidgetInterface
{

    private $formatDisplayData;
    private $formatData;
    private $minDate;
    private $maxDate;
    private $startDate;
    private $endDate;
    private $dateLimit;

    /**
     * Class Constructor
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->id   = 'tdaterangepicker' . mt_rand(1000000000, 1999999999);
        $this->{'style'}  = 'border: none; background:none; outline:none;';
        $this->{'style'} .= 'box-shadow: none; cursor: pointer; padding: 0px 20px';
        // $this->reportrange->{'class'} = 'pull-left';

    }



    /**
     * Shows the widget at the screen
     */
    public function show()
    {
        TPage::include_css('app/resources/daterangepicker.css');


        $reportrange = new TElement('div');
        $reportrange->id = 'reportrange_' . uniqid();
        $reportrange->{'class'} = 'form-control pull-right';
        $reportrange->{'style'} = 'cursor: pointer; padding-top: 0px; padding-bottom: 0px; height:28px';

        $icon_calender = new TElement('i');
        $icon_calender->{'class'} = 'glyphicon glyphicon-calendar fa fa-calendar';
        $icon_calender->{'style'} = 'margin-right: -20px';


        $icon = new TElement('b');
        $icon->{'class'} = 'caret pull-right';
        $icon->{'style'} .= ';margin-top: 10px; margin-left: -20px';

        $reportrange->open();
        $icon_calender->show();
        parent::show();
        $icon->show();
        $reportrange->close();


        TScript::create("$(document).ready( function() {
        if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
          console.log('init_daterangepicker');

          var cb = function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            var input = document.getElementById('".$this->id."');
            input.value = start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY');
          };

          var optionSet = {
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Hoje': [moment(), moment()],
                'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                'Este Mês': [moment().startOf('month'), moment().endOf('month')],
                'Mês Passado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' para ',
            locale: {
            applyLabel: 'Aplicar',
            cancelLabel: 'Limpar',
            fromLabel: 'De',
            toLabel: 'Para',
            customRangeLabel: 'Escolher Perildo',
            daysOfWeek: ['D', 'S', 'T', 'Q', 'T', 'S', 'S'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            firstDay: 1
            }
          };

          $('#".$this->id."').val(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
          $('#".$reportrange->id."').daterangepicker(optionSet, cb);
          $('#".$reportrange->id."').on('show.daterangepicker', function() {
            console.log('show event fired');
          });
          $('#".$reportrange->id."').on('hide.daterangepicker', function() {
            console.log('hide event fired');
          });
          $('#".$reportrange->id."').on('apply.daterangepicker', function(ev, picker) {
            console.log('apply event fired, start/end dates are ' + picker.startDate.format('MMMM D, YYYY') + ' to ' + picker.endDate.format('MMMM D, YYYY'));
          });
          $('#".$reportrange->id."').on('cancel.daterangepicker', function(ev, picker) {
            console.log('cancel event fired');
          });
          $('#create').click(function() {
            $('#".$reportrange->id."').data('daterangepicker').setOptions(optionSet, cb);
          });
          $('#destroy').click(function() {
            $('#".$reportrange->id."').data('daterangepicker').remove();
          });
        });");
        TPage::include_js('app/resources/daterangepicker.js');

    }



    /**
     * Set the value of Format Display Data
     *
     * @param mixed formatDisplayData
     *
     * @return self
     */
    public function setFormatDisplayData($formatDisplayData)
    {
        $this->formatDisplayData = $formatDisplayData;

        return $this;
    }

    /**
     * Set the value of Format Data
     *
     * @param mixed formatData
     *
     * @return self
     */
    public function setFormatData($formatData)
    {
        $this->formatData = $formatData;

        return $this;
    }

    /**
     * Set the value of Min Date
     *
     * @param mixed minDate
     *
     * @return self
     */
    public function setMinDate($minDate)
    {
        $this->minDate = $minDate;

        return $this;
    }

    /**
     * Set the value of Max Date
     *
     * @param mixed maxDate
     *
     * @return self
     */
    public function setMaxDate($maxDate)
    {
        $this->maxDate = $maxDate;

        return $this;
    }

    /**
     * Set the value of Start Date
     *
     * @param mixed startDate
     *
     * @return self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Set the value of End Date
     *
     * @param mixed endDate
     *
     * @return self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Set the value of Date Limit
     *
     * @param mixed dateLimit
     *
     * @return self
     */
    public function setDateLimit($dateLimit)
    {
        $this->dateLimit = $dateLimit;

        return $this;
    }

}
