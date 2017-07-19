using UnityEngine;
using System.Collections;

public class HUDScript : MonoBehaviour {

	public Font TimerFont;
	float playerScore = 0;
	public float Timer = 25;

	void Update () {
	
		playerScore += Time.deltaTime/2;
		Timer -= Time.deltaTime/2;

	}

	void OnDisable()
	{
		PlayerPrefs.SetInt ("Score", (int)(playerScore*10));
		PlayerPrefs.SetInt ("Time", (int)(Timer));
	}

	public void IncreaseScore(int amount)
	{
		playerScore += amount;
	}

	public void TimerIncrease(int amount)
	{
		Timer = Timer + amount;
	}

	public void TimerReset()
	{
		Timer = 25;
	}

	void OnGUI()
	{
		GUIStyle TimerStyle = new GUIStyle ();
		TimerStyle.font = TimerFont;
		GUI.Label(new Rect(10, 10, 100, 30), "Score: " + (int)(playerScore * 10));
		GUI.Label(new Rect(150, 10, 100, 30), "Time: " + (int)(Timer), TimerStyle );
	}
}
