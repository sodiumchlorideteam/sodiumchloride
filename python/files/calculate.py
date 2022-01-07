def predict(x,y,prediction_based_on,given_value,who):
	#swaping
	if prediction_based_on == 'y':
		x,y = y,x
	if who == 'linear_regression':
		try:
			from scipy import stats
		except Exception as e:
			print(str(e))
			exit()
		slope, intercept, r, p, std_err = stats.linregress(x, y)
		def __cal_tem__(gv):
			return slope * float(gv) + intercept
		if prediction_based_on == 'y':
			x,y = y,x
		calc_template  = list(map(__cal_tem__, x))
		predict = __cal_tem__(given_value)

	elif who == 'polynomial_regression':
		try:
			import numpy
			from sklearn.metrics import r2_score
		except Exception as e:
			print(str(e))
			exit()
		#predicting
		calc_template = numpy.poly1d(numpy.polyfit(x, y, 3))
		predict       = calc_template(float(given_value))
		r             = r2_score(y,calc_template(x))
		if prediction_based_on == 'y':
			x,y = y,x
			calc_template = numpy.poly1d(numpy.polyfit(x, y, 3))
	return predict,r,calc_template

def relationship(r):
    if -1==r or r==1:
    	message ="perfect relationship between given X and Y"
    elif -1<r and r<-0.8 or 0.8<r and r<1 :
    	message = "strong relationship between given X and Y"
    elif -0.8<r and r<-0.6 or 0.6<r and r<0.8:
    	message ="moderating relationship  between given X and Y"
    elif -0.6<r and r<-0.4 or 0.4<r and r<0.6:
    	message ="low relationship between given X and Y"
    elif -0.4<r and r <-0.2 or 0.2<r and r <0.4:
    	message ="poor relationship between given X and Y"
    elif -0.2<r and r <0 or 0<r and r <0.2:
    	message = "very poor relationship between given X and Y "
    return message

def prepare_output(prediction,r,who,plot_location):
	if who == 'linear_regression' or who == 'polynomial_regression':
		message = relationship(r)
		output = '{"prediction":"'+str(prediction)+'","r":"'+str(r)+'","message":"'+message+'","plot path":"'+plot_location+'"}'
		return output		

class statistics:
	def calculate(method,data):
		try:
			import numpy as np
		except Exception as e:
			print(str(e))
			exit()
		if method == "mean":
			answer = np.mean(data)
		elif method == "median":
			answer = np.median(data)
		elif method == "mode":
			from scipy import stats
			answer = stats.mode(data)
		elif method == "std_deviation":
			answer = np.std(data)
		elif method == "variance":
			answer = np.var(data)
		else:
			answer = "method error !"
		return max(data),min(data),answer

	def output(method,maxi,mini,answer):
		if method == "mode" :
			output = '{"maximum":"'+str(maxi)+'","minimum":"'+str(mini)+'","mode value":"'+str(answer[0][0])+'","number of times it has been sorted":"'+str(answer[1][0])+'"}'		
		else:
			output = '{"maximum":"'+str(maxi)+'","minimum":"'+str(mini)+'","'+str(method)+'":"'+str(answer)+'"}'
		return output