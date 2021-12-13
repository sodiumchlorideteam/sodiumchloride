import sys
import json

python_modules = sys.argv[1]
python_library = sys.argv[2]
file_name      = sys.argv[3]
file_path      = sys.argv[4]
who            = sys.argv[5]
if who == "linear" or who == "polynomial" or who == "data-visualization":
	plot_path = sys.argv[6]
	json_data = sys.argv[7]
else :
	json_data      = sys.argv[6]


# python modules path ./Compute/py/modules
sys.path.insert(1,python_modules)
# python library path ./Compute/py/lib
sys.path.insert(1,python_library)
try:
	import read_file
	import plot_it
except Exception as e:
	print("<p style='color:red;'>"+str(e)+"</p>")
	exit()

#prepare resources
decoded_json = json.loads(json_data)
length       = len(decoded_json)

if who == 'data-visualization':
	graph,label_array,file_data = read_file.data_visualization.read_file(file_name,file_path,decoded_json)
	plot                        = plot_it.data_visualization.draw_graph(graph,label_array,file_data,plot_path)
	result                      = '{"plot path":"'+str(plot)+'"}'
	print(result)

elif who == 'linear' or who == 'polynomial':
	x_label_array,y_label_array,file_data = read_file.read_it(file_name,file_path,who,decoded_json,length)
	if file_data == False:
		print('unsupported file extension given')
		exit()
	x         = file_data[0][0].values
	y         = file_data[0][1].values
	if decoded_json['value-x'] == '?':
		prediction_based_on = 'y'
		given_value         = decoded_json['value-y']
	else:
		prediction_based_on = 'x'
		given_value         = decoded_json['value-x']
	try:
		import calculate	
	except Exception as e:
		print("<p style='color:red;'>"+str(e)+"</p>")
		exit()
	#calculation
	prediction,r,calc_template = calculate.predict(x,y,prediction_based_on,given_value,who)
	#save the graph
	plot_location = plot_it.plot_it(who,plot_path,x,y,x_label_array,y_label_array,calc_template,given_value,prediction,prediction_based_on)
	result       = calculate.prepare_output(prediction,r,who,plot_location)
	print(result)
elif who == "statistics":
	import calculate
	method,label,file_data            = read_file.statistics.read_file(file_name,file_path,who,decoded_json,length)
	maximum,minimum,calculated_answer = calculate.statistics.calculate(method,file_data[0].values)
	result                            = calculate.statistics.output(method,maximum,minimum,calculated_answer)
	print(result)