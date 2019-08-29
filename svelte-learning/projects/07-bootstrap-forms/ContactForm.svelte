<script>
  import 'bootstrap/dist/css/bootstrap.min.css';
  import { onMount } from 'svelte';

  let formData = {
    name: '',
    email: '',
    subject: '',
    message: ''
  };

  let submitted = false;
  let loading = false;

  onMount(() => {
    // Initialize Bootstrap tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  });

  async function handleSubmit() {
    loading = true;
    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 1000));
    submitted = true;
    loading = false;
  }
</script>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Contact Us</h2>
          
