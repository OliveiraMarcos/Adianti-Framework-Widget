# Adianti-Framework-Widget
Componentes para Adianti Framework

## Date Range Piker
### Exemplo
```
$perildo = new TDateRangePicker('perildo');
$this->form->addQuickField('Perildo', $perildo, '100%');

$perildo->setFormatDisplayDate('MMMM D, YYYY');
$perildo->setFormatDate('MM/DD/YYYY');
$perildo->setMaxDate('12/31/2015');
$perildo->setMinDate('01/01/2012');
$perildo->setStartDate("moment().subtract(29, 'days')");
$perildo->setEndDate('moment()');
$perildo->setDateLimit('60');
```

## Widget para Dashboard
### Exemplo
```
$mostro = new TCount();
$mostro->addField(new TCountField(258, 10, 'Teste', 'Primeiro teste', 'fa:search', 'asc'));
$mostro->addField(new TCountField(257.23));
$mostro->addField(new TCountField(580.22));
$mostro->addField(new TCountField());
$mostro->addField(new TCountField());
$mostro->addField(new TCountField());

```

## Demostração
![ScreenShot](https://github.com/0l1v31r4/Adianti-Framework-Widget/blob/master/img.png)
