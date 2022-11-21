import { createApp } from 'vue'

import Counter from "./components/Counter";

const app = createApp(Counter);

app.mount("#counter-app")