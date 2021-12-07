<template>
  <div class="w-full">
    <input
      type="text"
      class="
        w-full
        mx-auto
        relative
        inline-block
        p-4
        font-bold
        appearance-none
        outline-none
        focus:border-yellow-500
        text-gray-600 text-xl
        rounded-md
        shadow
      "
      placeholder="Name your pizza"
      name="name"
      id="pizza-name-input"
      v-model="name"
      v-on:keyup.enter="submitName"
    />
  </div>
</template>

<script>
export default  {
  props: ['pizzaName', 'pizzaId'],
  data() {
    return {
      name: this.pizzaName,
      csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content")
    }
  },
  methods: {
    submitName() {
      if (this.pizzaId === '') {
        console.log(this.name)
        axios.post('/pizza', { name: this.name }, { 'X-CSRF-TOKEN': this.csrf })
        .then(res => {
          var data = res.data;
          console.log(data.id);
          window.location.href = `/pizza/${data.id}`
        })
        .catch(err => {
          console.log(err);
        });
      }
    }
  }
};
</script>

<style>
</style>