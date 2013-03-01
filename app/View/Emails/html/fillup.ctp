<h1>Receipt</h1>
<table>
  <tr>
    <th>Capacity</th>
    <th>Price</th>
    <th>Total</th>
  </tr>
  <tr>
    <td><?php echo $data['Fillup']['litres']; ?>li</td>
    <td><?php echo $this->Number->currency($data['Fillup']['price_per_litre']); ?></td>
    <td><?php echo $this->Number->currency($data['Fillup']['cost'],'GBP'); ?></td>
  </tr>
  
</table>