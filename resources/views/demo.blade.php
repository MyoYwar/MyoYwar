<h5 class="subtitle"> Demo </h5>
<form>
	<div class="field is-grouped">
		<p class="control">
			<span class="select">
				<select v-model="selected" @change="getChild">
					<option v-for="place in places" :value="place.id">
						@{{ place.zg}}
					</option>
				</select>
			</span>
		</p>
		<p class="control">
			<span class="select">
				<select>
					<option v-for="town in towns" :value="town.id">
						@{{ town.zh }} 
					</option>
				</select>
			</span>

		</p>
	</div>

</form>
<br/> <br/>
<form>
	<div class="field is-grouped">
		<p class="control">
			<span class="select">
				<select v-model="selectedTwo" @change="fetchChild(this)">
					<option v-for="place in places" :value="place.id">
					 @{{ place.zg }}
					</option>
				</select>
			</span>
		</p>
		<p class="control">
			<span class="select">
				<select>
					<option v-for="town in townTwo" :value="town" >
					@{{ town.zh }}
					</option>
				</select>
			</span>

		</p>
	</div>

</form>


