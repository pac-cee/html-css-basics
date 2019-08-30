<script>
  import TodoContext from './lib/TodoContext.svelte';
  import { getContext } from 'svelte';
  
  let newTodo = '';
  
  const { todos, add, remove, toggle } = getContext('todos');
</script>

<TodoContext>
  <div class="todo-app">
    <input 
      bind:value={newTodo}
      placeholder="What needs to be done?"
      on:keydown={e => {
        if (e.key === 'Enter' && newTodo) {
          add(newTodo);
          newTodo = '';
        }
