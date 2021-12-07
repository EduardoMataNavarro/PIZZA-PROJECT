<template>
  <div class="w-full">
      <button @click="setTopping(topping.id)" class="w-full h-full rounded-lg p-4" v-bind:class="isSelected ? ['shadow-inner', 'bg-yellow-500'] : ['shadow-md', 'bg-gray-50']">
          <img
            class="w-1/2 h-auto mx-auto mt-4"
            :src="topping.image"
            :alt="topping.name"
          />
          <p class="text-center font-bold mt-2">{{ topping.name }}</p>
        </button>
  </div>
</template>

<script>
export default {
    props: ['topping', 'selected', 'pizzaId'],
    data: () => ({
        isSelected: this.selected 
    }),
    mounted() {
        
        console.log(this.isSelected);
        console.log(this.topping);
    },
    methods: {
        setTopping(toppingId) {
            
        let payload = {
          pizza_id: this.pizzaId,
          topping_id: toppingId,
          quantity: 0 
        }
          axios.post('/pizza-topping', payload)
          .then(res => {
            const data = res.data;
            console.log(data); 
            this.pizzaToppings = data; 
            this.toggleToppingStyle(toppingId);
          })
          .catch(err => {
            console.log(err);
          });
      }
    }
}
</script>

<style>

</style>