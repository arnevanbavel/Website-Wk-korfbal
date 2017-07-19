using UnityEngine;
using System.Collections;

public class GameOverScreenBuilder : MonoBehaviour 
{
	private int score = 0;

	void Start () 
	{
		score = PlayerPrefs.GetInt ("Score");
	}

	void OnGUI()
	{
		GUI.Label (new Rect (0,0,10,10), "The End");
		GUI.Label (new Rect (10,10,10,10), "Score: " + score);

		if (GUI.Button (new Rect (0,0,10,10), "Retry?")) 
		{
			Application.LoadLevel(1);
		}

		if (GUI.Button (new Rect (0,0,10,10), "Home")) 
		{
			Application.LoadLevel(0);
		}

		if (GUI.Button (new Rect (0,0,10,10), "Close")) 
		{
			Application.Quit();
		}
	}
}
