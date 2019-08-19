<script>
    import { onMount } from 'svelte';

    let users = [];
    let loading = true;
    let error = null;

    async function fetchUsers() {
        try {
            const response = await fetch('https://jsonplaceholder.typicode.com/users');
            if (!response.ok) throw new Error('Failed to fetch users');
            users = await response.json();
        } catch (e) {
            error = e.message;
        } finally {
            loading = false;
        }
    }

    onMount(fetchUsers);
</script>

<div class="user-list">
    <h2>User List Example</h2>

    {#if loading}
        <div class="loading">Loading users...</div>
    {:else if error}
        <div class="error">Error: {error}</div>
    {:else}
        <div class="users">
            {#each users as user (user.id)}
                <div class="user-card">
                    <h3>{user.name}</h3>
                    <p><strong>Email:</strong> {user.email}</p>
                    <p><strong>Company:</strong> {user.company.name}</p>
                </div>
            {/each}
        </div>
    {/if}
</div>

<style>
    .user-list {
        max-width: 800px;
        margin: 2rem auto;
        padding: 1rem;
    }

    .loading {
        text-align: center;
        padding: 2rem;
        font-size: 1.2rem;
        color: #666;
    }

    .error {
