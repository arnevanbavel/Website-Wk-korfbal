using UnityEngine;
using System.Collections;

public class SoundManager : MonoBehaviour 
{
	public AudioClip BackgroundMusic;
	public AudioClip CoinGrabSound;
	public AudioClip MistakeSound;
	public AudioClip GameOverSound;
	public AudioClip StartSound;
	public AudioClip FlameSound;
	AudioSource fxSound;

	// Use this for initialization
	void Start () 
	{
		fxSound = GetComponent<AudioSource> ();
		fxSound.PlayOneShot (BackgroundMusic);
	}

	void OnTriggerEnter2D(Collider2D coll)
	{ 
			if (coll.gameObject.tag == "Coin") 
			{
				fxSound.PlayOneShot(CoinGrabSound);
			}

			if (coll.gameObject.tag == "GhostBall") 
			{
				fxSound.PlayOneShot(FlameSound);
			}

			if (coll.gameObject.tag == "Enemy") 
			{
				fxSound.PlayOneShot(MistakeSound);
			}
	}
}
