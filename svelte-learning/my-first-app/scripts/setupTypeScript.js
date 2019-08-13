// @ts-check

/** This script modifies the project to support TS code in .svelte files like:

  <script lang="ts">
  	export let name: string;
  </script>
 
  As well as validating the code for CI.
  */

/**  To work on this script:
  rm -rf test-template template && git clone sveltejs/template test-template && node scripts/setupTypeScript.js test-template
*/

import fs from "fs"
import path from "path"
import { argv } from "process"
import url from 'url';

const __filename = url.fileURLToPath(import.meta.url);
const __dirname = url.fileURLToPath(new URL('.', import.meta.url));
const projectRoot = argv[2] || path.join(__dirname, "..")

// Add deps to pkg.json
const packageJSON = JSON.parse(fs.readFileSync(path.join(projectRoot, "package.json"), "utf8"))
packageJSON.devDependencies = Object.assign(packageJSON.devDependencies, {
  "svelte-check": "^3.0.0",
  "svelte-preprocess": "^5.0.0",
  "@rollup/plugin-typescript": "^11.0.0",
  "typescript": "^4.9.0",
  "tslib": "^2.5.0",
  "@tsconfig/svelte": "^3.0.0"
})

// Add script for checking
packageJSON.scripts = Object.assign(packageJSON.scripts, {
  "check": "svelte-check"
