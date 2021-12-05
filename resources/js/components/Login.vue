<template>
  <div class="min-h-full flex items-center justify-center py-12">
    <div class="max-w-md w-full">
      <div>
        <img
          class="mx-auto h-60 w-auto"
          src="https://pizza-project.s3.us-west-1.amazonaws.com/assets/pizza-icon.png"
          alt=""
          srcset=""
        />
        <h4 class="mt-2 mb-4 text-center text-lg text-gray-700">
          Log into your account to browse and create pizzas
        </h4>
      </div>
      <form @submit.prevent="login">
        <div class="rounded-md shadow-md">
          <div>
            <label for="email-input" class="sr-only">Email</label>
            <input
              type="email"
              class="
                appearance-none
                rounded-none
                shadow-none
                relative
                block
                w-full
                px-4
                py-2
                border
                rounded-t-md
              "
              name=""
              id="email-input"
              placeholder="User email"
              :v-bind="username"
            />
          </div>
          <div>
            <label for="password-input" class="sr-only">password</label>
            <input
              type="password"
              class="
                appearance-none
                rounded-none
                relative
                block
                shadow
                w-full
                px-4
                py-2
                border
                rounded-b-md
              "
              name="password"
              id="password-input"
              placeholder="Password"
              :v-bind="password"
            />
          </div>
        </div>
        <div>
          <input type="hidden" name="_token" :value="csrf" />
          <button
            type="submit"
            class="
              bg-yellow-400
              hover:bg-yellow-600
              text-white
              shadow-md
              mt-8
              p-2
              w-full
              flex
              justify-center
              rounded
            "
          >
            Log in
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {

  data() {
    return {
      username: "",
      password: "",
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      message: "",
    };
  },
  methods: {
  },
};
</script>

<style>
</style>