<template>
  <div class="w-full">
    <form @submit.prevent="saveTopping">
      <div>
        <label for="name-input" class="sr-only">Name</label>
        <input
          type="text"
          id="name-input"
          placeholder="Name"
          class="
            py-2
            px-1
            rounded
            shadow
            outline-none
            appearance-none
            border
            focus:border-yellow-500
          "
          v-model="name"
        />
      </div>
      <div>
        <label for="quantity-input" class="sr-only">Quantity</label>
        <input
          type="number"
          class="
            mt-4
            py-2
            px-1
            rounded
            shadow
            outline-none
            appearance-none
            border
            focus:border-yellow-500
          "
          placeholder="quantity"
          name="quantity"
          id="quantity-input"
          v-model="quantity"
        />
      </div>
      <div>
        <label for="price-input" class="sr-only">Price</label>
        <input
          type="number"
          class="
            mt-4
            py-2
            px-1
            rounded
            shadow
            outline-none
            appearance-none
            border
            focus:border-yellow-500
          "
          placeholder="price"
          name="price"
          id="price-input"
          v-model="price"
        />
      </div>
      <div>
        <label for="image-input" class="sr-only">Image</label>
        <input
          type="file"
          class="mt-4"
          accept="image/png, image/jpg, image/jpeg"
          name="image"
          id="image-input"
          @change="previewImage"
        />
      </div>
      <div>
        <button
          type="submit"
          class="
            bg-yellow-400
            hover:bg-yellow-500
            text-white
            py-2
            px-1
            mt-4
            rounded
            shadow
            w-full
          "
        >
          Save
        </button>
      </div>
    </form>
    <div class="mt-8">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th
              scope="col"
              class="
                px-6
                py-3
                text-left text-sm
                font-medium
                text-gray-500
                tracking-wider
              "
            >
              Name
            </th>
            <th
              scope="col"
              class="
                px-6
                py-3
                text-left text-sm
                font-medium
                text-gray-500
                tracking-wider
              "
            >
              Quantity
            </th>
            <th
              scope="col"
              class="
                px-6
                py-3
                text-left text-sm
                font-medium
                text-gray-500
                tracking-wider
              "
            >
              Price
            </th>
            <th
              scope="col"
              class="
                relative
                px-6
                py-3
                text-left text-xs
                font-medium
                text-gray-500
                uppercase
                tracking-wider
              "
            >
              Actions
              <span class="sr-only">Edit</span>
              <span class="sr-only">Delete</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(topping, index) in toppings" :key="index">
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                  <img
                    class="h-10 w-10 rounded-full"
                    :src="topping.image"
                    :alt="topping.name"
                  />
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">
                    {{ topping.name }}
                  </div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              {{ topping.quantity }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              {{ topping.price }}
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
            >
              <span
                @click="getTopping(topping.id)"
                class="text-yellow-600 hover:text-yellow-900"
                >Edit</span
              >
              <span
                @click="deleteTopping(topping.id)"
                class="text-red-600 hover:text-red-900 ml-4"
                >Delete</span
              >
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: () => ({
    toppings: [],
    id: "",
    name: "",
    price: "",
    quantity: "",
    image: "",
  }),
  mounted() {
    this.getToppings();
  },
  methods: {
    clearTopping() {
      this.id = "";
      this.name = "";
      this.price = "";
      this.quantity = "";
      this.image = "";
    },
    getToppings() {
      axios.get("/topping").then((res) => {
        const data = res.data;
        this.toppings = data;
      });
    },
    saveTopping() {
      let id = this.id;
      let name = this.name;
      let price = this.price;
      let quantity = this.quantity;
      let image = this.image;

      var data = new FormData();
      data.append("name", name);
      data.append("price", price);
      data.append("quantity", quantity);
      data.append("image", image);

      if (this.id != "") {
        axios
          .post(`/topping/${id}`, data, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((res) => {
            var data = res.data;
            if (data.error) {
              console.log(data.error);
            } else {
              console.log(data);
              this.getToppings();
              this.clearTopping();
            }
          })
          .catch((err) => {
            console.log(err);
          });
      } else {
        axios
          .post("/topping", data, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((res) => {
            var data = res.data;
            if (data.error) {
              console.log(data.error);
            } else {
              this.getToppings();
              this.clearTopping();
            }
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
    getTopping(id) {
      axios
        .get(`/topping/${id}`)
        .then((res) => {
          var data = res.data;
          this.id = data.id;
          this.name = data.name;
          this.quantity = data.quantity;
          this.price = data.price;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    deleteTopping(id) {
      axios
        .delete(`/topping/${id}`)
        .then((res) => {
          var data = res.data;
          if (data.error) {
            console.log(data.error);
          } else {
            this.getToppings();
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    previewImage(e) {
      var file = e.target.files[0];
      this.image = file;
    },
  },
};
</script>

<style>
</style>