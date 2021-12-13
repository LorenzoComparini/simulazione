<template>
  <div
    class="
      flex flex-col flex-grow
      space-y-8
      bg-white
      rounded-md
      p-12
      justify-between
      items-center
    "
  >
    <div class="w-1/2 h-full space-y-4">
      <div class="flex flex-col space-y-2">
        <div class="flex justify-between">
          <label for="title" class="font-medium">Titolo</label>
          <p class="text-red-600" v-if="invalidForm && !job.title">Compila questo campo</p>
        </div>
        <input
          id="title"
          type="text"
          class="w-full border-2 rounded-md px-2 py-2 outline-none"
          v-model="job.title"
        />
      </div>

      <div class="flex flex-col space-y-2">
        <div class="flex justify-between">
          <label for="agency" class="font-medium">Azienda</label>
          <p class="text-red-600" v-if="invalidForm && !job.agency">Compila questo campo</p>
        </div>
        <input
          id="agency"
          type="text"
          class="w-full border-2 rounded-md px-2 py-2 outline-none"
          v-model="job.agency"
        />
      </div>

      <div class="flex flex-col space-y-2">
        <div class="flex justify-between">
          <label for="langs" class="font-medium">Linguaggio richiesto</label>
          <p class="text-red-600" v-if="invalidForm && !job.language_id">Compila questo campo</p>
        </div>
        <select
          name=""
          id="langs"
          class="w-full border-2 bg-white rounded-md px-2 py-2 outline-none"
          v-model="job.language_id"
        >
          <option v-for="lang in languages" :key="lang.id" :value="lang.id">
            <i :class="lang.icon"></i>
            {{ lang.name }}
          </option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <div class="flex justify-between">
          <label for="ral" class="font-medium">Retribuzione annua</label>
          <p class="text-red-600" v-if="invalidForm && !job.ral">Compila questo campo</p>
        </div>
        <div class="flex items-center">
          <input
            id="ral"
            type="number"
            class="w-full border-2 rounded-md px-2 py-2 outline-none"
            v-model="job.ral"
          />
          <p class="px-2 text-xl">€</p>
        </div>
      </div>

      <div class="flex flex-col space-y-2">
        <div class="flex justify-between">
          <label for="exp" class="font-medium">Esperienza richiesta</label>
          <p class="text-red-600" v-if="invalidForm && !job.experience">Compila questo campo</p>
        </div>
        <select
          name="exp"
          id="langs"
          class="w-full border-2 bg-white rounded-md px-2 py-2 outline-none"
          v-model="job.experience"
        >
          <option value="Senior">Junior</option>
          <option value="Junior">Senior</option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <div class="flex justify-between">
          <label for="loc" class="font-medium">Location</label>
          <p class="text-red-600" v-if="invalidForm && !job.location">Compila questo campo</p>
        </div>
        <select
          name=""
          id="loc"
          class="w-full border-2 bg-white rounded-md px-2 py-2 outline-none"
          v-model="job.location"
        >
          <option value="Remoto">Remoto</option>
          <option value="Presenza">Presenza</option>
        </select>
      </div>

      <div class="flex flex-col space-y-2">
        <div class="flex justify-between">
          <label for="desc" class="font-medium">Descrizione</label>
          <p class="text-red-600" v-if="invalidForm && !job.description">Compila questo campo</p>
        </div>
        <textarea
          name=""
          id="desc"
          cols="30"
          rows="10"
          class="w-full border-2 rounded-md px-2 py-2 outline-none"
          v-model="job.description"
        ></textarea>
      </div>

      <div class="flex w-full justify-end py-2">
        <button
          class="
            px-5
            py-2
            space-x-2
            rounded-full
            text-yellow-500
            hover:bg-yellow-500 hover:text-white
            border-2 border-yellow-500
            transition
            duration-300
          "
          @click="create()"
        >
          Crea
          <i class="fas fa-check"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "CreateJob",

  data() {
    return {
      job: {},
      languages: [],
      isEdit: false,
      invalidForm: false,
    };
  },

  async mounted() {
    if (this.$route.name == "edit_name") {
      this.isEdit = true;
      let id = this.$route.params.id;
      console.log(id);
      this.job = (await axios.get("http://localhost:8000/api/jobs/" + id)).data;
    }

    this.languages = (
      await axios.get("http://localhost:8000/api/languages")
    ).data;
  },

  methods: {
    async create() {
      this.formValidator();

      if (!this.invalidForm) {
        if (!this.isEdit) {
          await axios.post("http://localhost:8000/api/jobs/", this.job);
        } else {
          let id = this.$route.params.id;
          await axios.post(
            "http://localhost:8000/api/jobs/edit/" + id,
            this.job
          );
        }

        this.$router.push("/home");
      }
    },

    formValidator() {
      if (
        this.job.title &&
        this.job.agency &&
        this.job.language_id &&
        this.job.ral &&
        this.job.experience &&
        this.job.location &&
        this.job.description
      ) {
        this.invalidForm = false;
      } else {
        this.invalidForm = true;
      }
    },
  },
};
</script>
