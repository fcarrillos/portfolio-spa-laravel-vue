

<template>
    <Head title="Welcome"></Head>

    <div class="
        grid
        grid-cols-2
        text-right
        py-10
        px-72
        bg-gray-800
        text-gray-300
    ">
        <div>
            <jet-application-mark class="h-12 w-auto"></jet-application-mark>
        </div>
        <div v-if="canLogin">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-base underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="text-base underline place-self-end ml-4">
                    Register
                </Link>
            </template>
        </div>

    </div>

    
    <Section class="
        bg-gray-800
        pt-16
        h-screen
        ">

        <div class="h-2/3 flex flex-wrap content-between border-gray-600 pb-36">
            <p class="
                border-b-2
                font-bold
                border-gray-400
                pb-3
                text-2xl
                text-gray-300
                uppercase
            ">
            Hola me llamo Nando. Soy desarrollador de aplicaciones web
            </p>
            <div class="flex items-end border-b-2 border-gray-500 pb-2">
                <p class="
                    font-bold
                    mr-5
                    text-gray-500
                    text-xl
                ">
                    ¿Quieres conocer más?
                </p>
                <jet-button class="
                    bg-green-400
                    rounded
                    font-bold
                    text-sm
                    text-gray-800
                    hover:bg-green-500

                ">
                    Hablemos!
                </jet-button>
            </div>
            
        </div>
        <div class="animate-pulse mt-3 text-gray-300 text-center text-9xl">
            <a href="#skills">&#8675;</a>
        </div>
        
    </Section>

    <Section id="skills" class="bg-gray-200 text-gray-800 h-screen">
        <h2 class="text-6xl font-bold pt-3">Skills</h2>

        <div class="grid grid-cols-2">
            <div v-for="skill in skills" :key="skill.id">
                <Skill :background="skill.color">
                    {{ skill.name }}
                </Skill>
            </div>
        </div>

        <div class="flex justify-center mt-10">
            <jet-button class="
                    bg-indigo-800
                    rounded
                    font-bold
                    text-sm
                    text-gray-200
                    hover:bg-indigo-700

            ">
                Saber más
            </jet-button>
        </div>
    </Section>

    <Section class="bg-gray-600 text-gray-200"> <!-- elimino la clase h-screen porque al renderizar los projectos de supera el tamaño de la pantalla y se monta con el footer -->
        <h2 class="text-6xl font-bold pt-3">Projects</h2>

        <div v-for="(project, index) in projects" :key="project.id"><!-- project.id -->
            <Project :title="project.title" 
                     :description="project.description"
                     :color="project.color"
            >
                <component :is="componentName(index)"></component>
            </Project>
        </div>
        

        <div class="flex justify-center mt-10">
            <jet-button class="
                    bg-purple-100
                    rounded
                    font-bold
                    text-sm
                    text-gray-800
                    hover:bg-purple-500

                ">
                    Saber más
            </jet-button>
        </div>
    </Section>

    <Section class="
        flex
        justify-between
        bg-gray-800
        text-gray-300
        text-xl
        ">
        <p>&copy; Fernando Carrillo Sánchez</p>
        <div class="flex justify-evently items-center">
            <Link class="border-b pb-1 px-2 hover:text-gray-50" href="#" target="_blank">
            Github
            </Link>
            <Link class="border-b pb-1 px-2 hover:text-gray-50" href="#" target="_blank">
            Twitter
            </Link>
        </div>
    </Section>
</template>    

<script>
import { defineAsyncComponent, defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetButton from '@/Jetstream/Button.vue'

import Section from '@/Components/Section.vue'
import Skill from '@/Components/Skill.vue'
import Project from '@/Components/Project.vue'




export default defineComponent({

    components:{
    Head,
    Link,
    JetApplicationMark,
    JetButton,
    Section,
    Skill,
    Project,
    
    },
    
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        skills: Object,
        projects: Object,
    },
    methods: {/* @vite-ignore */
        componentName(index) {
                return defineAsyncComponent(() =>
                    import (
                        '../heroicons/vue/solid/'
                        + this.projects[index].icon_name
                        + 'Icon.js'
                    )
                )
            },
        
    }
    

})

/* defineProps({
    canLogin: Boolean,
    canRegister: Boolean,

    }) */


</script>

<!-- componentName(index, projects) {
            return defineAsyncComponent(() =>
                import (/* @vite-ignore */
                    `../heroicons/vue/solid/
                    ${this.projects[index].icon_name}
                    'Icon.js'`
                )    
            )
        } -->