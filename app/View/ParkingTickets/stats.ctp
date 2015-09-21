<h1>Parking Stats</h1>

<table class="stats">
  <tbody>
  <?php foreach($stats as $stat) : ?>
  <tr>
    <th rowspan="2"><?php echo $stat[0]['month_year']; ?></th>
    <td><?php echo $this->Number->currency($stat[0]['total_spent'],'GBP'); ?></td>
    <td><?php echo $this->Number->format($stat[0]['total_tickets']); ?></td>
    <td><?php echo $this->Number->format($stat[0]['total_hours']); ?></td>
    <td><?php echo $this->Number->format($stat[0]['total_used_length']); ?></td>
  </tr>
  <tr>
    <th>total spent</th>
    <th>tickets</th>
    <th>hours</th>
    <th>used</th>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
