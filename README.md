# Adianti-Framework-Widget
Componentes para Adianti Framework

## Date Range Piker
### Exemplo
```
$periodo = new TDateRangePicker('periodo');
$this->form->addQuickField('Período', $periodo, '100%');

$periodo->setFormatDisplayDate('MMMM D, YYYY');
$periodo->setFormatDate('MM/DD/YYYY');
$periodo->setMaxDate('12/31/2015');
$periodo->setMinDate('01/01/2012');
$periodo->setStartDate("moment().subtract(29, 'days')");
$periodo->setEndDate('moment()');
$periodo->setDateLimit('60');
```

## Widget para Dashboard
### Exemplo
```
$mostrar = new TCount();
$mostrar->addField(new TCountField(258, 10, 'Teste', 'Primeiro teste', 'fa:search', 'asc'));
$mostrar->addField(new TCountField(257.23));
$mostrar->addField(new TCountField(580.22));
$mostrar->addField(new TCountField());
$mostrar->addField(new TCountField());
$mostrar->addField(new TCountField());

```

## Demostração
![ScreenShot](https://github.com/0l1v31r4/Adianti-Framework-Widget/blob/master/img.png)
