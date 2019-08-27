{/* Add Tailwind base styles */}
<style lang="postcss">
  @tailwind base;
  @tailwind components;
  @tailwind utilities;
</style>

<script>
  let stats = [
    { title: 'Total Users', value: '1,234', change: '+12%', icon: '👥' },
    { title: 'Revenue', value: '$12,345', change: '+8%', icon: '💰' },
    { title: 'Active Projects', value: '45', change: '+5%', icon: '📊' },
    { title: 'Conversion Rate', value: '3.2%', change: '+2%', icon: '📈' }
  ];
</script>

<div class="min-h-screen bg-gray-100">
  {/* Navigation */}
  <nav class="bg-white shadow-lg">
