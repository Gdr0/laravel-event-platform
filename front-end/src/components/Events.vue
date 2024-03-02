<script>
import axios from "axios";
export default {
    name: "Events",
    data() {
        return {
            events: [],
        };
    },
    mounted() {
        axios
            .get("http://localhost:8000/api/v1/events")
            .then((res) => {
                this.events = res.data[0];
                console.log(this.events);
            })
            .catch((err) => console.log(err));
    },
};
</script>

<template>
    <h1>Hello swag</h1>
    <div v-for="event in events" :key="event.id">
        <h1>
            {{ event.title }}
        </h1>
        <p>{{ event.description }}</p>
    </div>
</template>

<style scoped>
.read-the-docs {
    color: #888;
}
ul {
    list-style: none;
}
</style>
