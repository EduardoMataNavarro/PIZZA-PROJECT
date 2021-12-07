<template>
  <div class="w-full">
    <div class="w-full my-8">
      <h3
        class="text-center font-bold text-2xl text-gray-500 my-12"
        v-if="pizzaToppings.length === 0"
        :v-bind="pizzaToppings"
      >
        Your pizza has no ingredients
      </h3>
      <h3 class="text-center font-bold text-2xl text-gray-500 my-12" v-else>
        Your pizza may contain
        <span v-for="(topping, index) in pizzaToppings" :key="index">
          {{ topping.name }}
        </span>
      </h3>
    </div>
    <div class="grid gap-8 grid-cols-4 mt-8">
      <div
        class="w-full h-52 bg-gray-50"
        v-for="(topping, index) in toppings"
        :key="index"
      >
        <button
          @click="setTopping(topping.id)"
          class="w-full h-full shadow-md rounded-lg p-4"
        >
          <img
            class="w-1/2 h-auto mx-auto mt-4"
            :src="topping.image"
            :alt="topping.name"
          />
          <p class="text-center font-bold mt-2">{{ topping.name }}</p>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["pizzaId"],
  data: () => ({
    toppings: [],
    pizzaToppings: [],
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
  }),
  mounted() {
    axios.get("/topping").then((res) => {
      const data = res.data;
      console.log(data);
      this.toppings = data;
    });
    axios
      .get(`/pizza-topping/${this.pizzaId}`)
      .then((res) => {
        var data = res.data;
        console.log(data);
        this.pizzaToppings = data;
      })
      .catch((err) => {
        console.log(err);
      });
  },
  methods: {
    setTopping(toppingId) {
      let payload = {
        pizza_id: this.pizzaId,
        topping_id: toppingId,
        quantity: 0,
      };
      console.log(payload);
      axios
        .post("/pizza-topping", payload)
        .then((res) => {
          const data = res.data;
          console.log(data);
          this.pizzaToppings = data;
          // this.toggleToppingStyle(toppingId);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    toggleToppingStyle(toppingId) {
      return {
        "shadow-inner": this.pizzaToppings.includes(toppingId),
        "bg-yellow-400": this.pizzaToppings.includes(toppingId),
        "text-white": this.pizzaToppings.includes(toppingId),
        "shadow-md": !this.pizzaToppings.includes(toppingId),
      };
    },
  },
};
</script>

<style>
</style>